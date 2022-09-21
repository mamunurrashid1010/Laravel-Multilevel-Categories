<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Multilevel Categories</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body>

        <!-- categories example 1 -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header"><h3>Laravel Multilevel Categories Example-1</h3></div>
                        <div class="card-body">
                            @foreach($parentCategories as $category)
                                <ul>
                                    <li>{{$category->name}}</li>
                                    @if(count($category->subcategory))
                                        @include('subCategoryList',['subcategories' => $category->subcategory])
                                    @endif
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /categories example 1 -->

</body>
</html>
