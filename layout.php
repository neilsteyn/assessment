<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RR - Shopping List</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <style>
        body{
            font-family: "Open Sans", sans-serif;
            line-height: 1.6;
        }

        div.content{
            max-width: 350px;
            border: 1px solid gray;
            border-radius: 5px;
            padding: 15px;
        }

        ul{
            padding: 0;
        }
        li{
            list-style: none;
            margin: 10px 0;
        }
        li input[type='checkbox']{
            margin: 10px;
        }

        li span:first-child{
            margin-right: 50px;
        }

        li a{
            margin: 10px;
        }
        li a:hover{
            cursor: pointer;
        }
        .add-section input[name='shopping_list_item']{
            width: 80%;
        }
    </style>
    </head>
    <body>
        <section>
            <div class="container">
                <div class="content">
                    <h1>Shopping List</h1>
                    <div class="">
                        <div class="add-section">
                            <form action="" method="POST">
                            <input type="text" name="action" value="add" hidden>
                            <input type="text" name="shopping_list_item">
                            <button type="submit">Add</button>
                            </form>
                        </div>
                        <ul>
                            <?php foreach ($lists as $key => $list){ ?>
                                <li id="<?= $list->id; ?>">
                                    <input type="checkbox">
                                    <span><?= $list->shopping_list_item; ?></span>
                                    <span><a class="btn btn-edit">Edit</a><a class="btn btn-delete">Delete</a></span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <script>
            jQuery('a.btn-edit').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();

                var li = jQuery(this).closest('li');
                var shopping_list_item_id = li.attr('id');
                var shopping_list_item_value = li.attr('id');

                api.update(shopping_list_item_id, shopping_list_item_value).then(()=>{

                }).catch(()=>{

                })
            });

            jQuery('a.btn-delete').on('click', function(e){
                e.preventDefault();
                e.stopPropagation();

                var li = jQuery(this).closest('li');
                var shopping_list_item_id = li.attr('id');

                api.delete(shopping_list_item_id).then(()=>{
                    li.remove();
                }).catch(()=>{

                })
            });


            let api = {
                endpoint: 'http://localhost/roomraccoon/assessment/rr-shopping-list-tool/api.php',

                request: async function (url, options = {}) {
                    return new Promise((resolve, reject) => {
                        let req = jQuery.ajax(url, options);

                        req.done(resolve);
                        req.fail(reject);
                    });
                },
                delete: async function (shopping_list_item_id) {
                    let queryParams = '?action=delete&shopping_list_item_id='+shopping_list_item_id;
                    return this.request(this.endpoint + queryParams);
                },
                update: async function (shopping_list_item_id, shopping_list_item) {
                    let queryParams = '?action=update&shopping_list_item_id='+shopping_list_item_id+'&shopping_list_item=shopping_list_item';
                    return this.request(this.endpoint + queryParams);
                }
            };

        </script>
    </body>
</html>