<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	$tags_en  =  App\Models\Product::select('product_tags_en')->distinct()->get();
    $tags_bng = App\Models\Product::groupBy('product_tags_bng')->select('product_tags_bng')->get();

    $relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
</body>
</html>