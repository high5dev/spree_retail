<?php
namespace App\Helpers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
class Recommendation
{

    public function __construct()
    {

    }

    public function recommend(Product $product)
    {
        $cats = $product->categories->pluck('name')->toArray();
        $s_matrix =  $this->similarityMatrix($product,$cats);
        arsort($s_matrix);
        $p_id = array_keys(array_slice($s_matrix, 0, 5, true));

        return Product::find($p_id);

    }

    public function updateSimilarityMatrix($c_product)
    {
        $array = $this->getFile();

        $c_cats = $c_product->categories->pluck('name')->toArray();
        $array = $this->addToSimilarityMatrix($c_product,$c_cats,$array);

        file_put_contents(__DIR__."/../../data/similarityMatrix.json",json_encode($array,1));

    }

    protected function similarityMatrix($c_product,$c_cats)
    {
        $array = $this->getFile();

        if (!array_key_exists($c_product->id,$array))
        {
            $array = $this->addToSimilarityMatrix($c_product,$c_cats,$array);

        }

        file_put_contents(__DIR__."/../../data/similarityMatrix.json",json_encode($array,1));

        return $array[$c_product->id];
    }

    protected function getFile()
    {
        $array = [];
        if (file_exists(__DIR__."/../../data/similarityMatrix.json"))
        {
            $array =json_decode(file_get_contents(__DIR__."/../../data/similarityMatrix.json"), true);
        }
        
        return $array;
    }

    protected function addToSimilarityMatrix($c_product,$c_cats,$array)
    {
        $array[$c_product->id] = array();
        $products = Product::where('status','Active')->get();
        foreach ($products as $product) {
            if ($c_product->id == $product->id)
            {
                continue;
            }
            $cats = $product->categories->pluck('name')->toArray();
            $union = array_unique(array_merge($cats, $c_cats));
            $intersection = array_intersect($cats, $c_cats);

            if (count($intersection) == 0){
                $score = 0;
            }else{
                $score = count($intersection) / count($union);
            }

            $array[$c_product->id][$product->id] = $score;

            if (array_key_exists($product->id,$array)){
                $array[$product->id][$c_product->id] = $score;
            }
        }

        return $array;
    }
}
