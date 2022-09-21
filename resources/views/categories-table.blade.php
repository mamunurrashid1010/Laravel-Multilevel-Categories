<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Multilevel Categories table view</title>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body { background-color:#fafafa; font-family:'Lucida Fax';}
        .container { margin:150px auto;}
        .treegrid-indent {
            width: 0px;
            height: 16px;
            display: inline-block;
            position: relative;
        }

        .treegrid-expander {
            width: 0px;
            height: 16px;
            display: inline-block;
            position: relative;
            left:-17px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- categories (table view) example 2 -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Laravel Multilevel Categories Table view example-2</h3></div><br>
                    <div class="card-body" style="font-size: 18px;font-family:'Lucida Fax'">
                        <table id="tree-table" class="table table-hover table-bordered">
                            <tbody>
                            <th>Categories </th>
                            @foreach($parentCategories as $category)
                                <tr data-id="{{$category->id}}" data-parent="0" data-level="1">
                                    <td data-column="name">{{$category->name}}</td>
                                </tr>
                                @if(count($category->subcategory))
                                    @include('subCategoryView',['subcategories' => $category->subcategory, 'dataParent' => $category->id , 'dataLevel' => 1])
                                @endif
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /categories (table view) example 2 -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- main script  -->
<script>
    $(function () {
        var
            $table = $('#tree-table'),
            rows = $table.find('tr');

        rows.each(function (index, row) {
            var
                $row = $(row),
                level = $row.data('level'),
                id = $row.data('id'),
                $columnName = $row.find('td[data-column="name"]'),
                children = $table.find('tr[data-parent="' + id + '"]');

            if (children.length) {
                var expander = $columnName.prepend('' +
                    '<span class="treegrid-expander glyphicon glyphicon-chevron-right"></span>' +
                    '');

                children.hide();

                expander.on('click', function (e) {
                    var $target = $(e.target);
                    if ($target.hasClass('glyphicon-chevron-right')) {
                        $target
                            .removeClass('glyphicon-chevron-right')
                            .addClass('glyphicon-chevron-down');

                        children.show();
                    } else {
                        $target
                            .removeClass('glyphicon-chevron-down')
                            .addClass('glyphicon-chevron-right');

                        reverseHide($table, $row);
                    }
                });
            }

            $columnName.prepend('' +
                '<span class="treegrid-indent" style="width:' + 15 * level + 'px"></span>' +
                '');
        });

        // Reverse hide all elements
        reverseHide = function (table, element) {
            var
                $element = $(element),
                id = $element.data('id'),
                children = table.find('tr[data-parent="' + id + '"]');

            if (children.length) {
                children.each(function (i, e) {
                    reverseHide(table, e);
                });

                $element
                    .find('.glyphicon-chevron-down')
                    .removeClass('glyphicon-chevron-down')
                    .addClass('glyphicon-chevron-right');

                children.hide();
            }
        };
    });

</script>

</body>
</html>
