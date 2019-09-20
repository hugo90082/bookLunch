<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-20 08:25:46
  from 'C:\xampp\htdocs\bookLunch\templates\create.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d8470ea1e3756_84369262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85df7804a6ee408120698486a6664e26da2b89fd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bookLunch\\templates\\create.html',
      1 => 1568616721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:src.html' => 1,
  ),
),false)) {
function content_5d8470ea1e3756_84369262 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <div class="container">
        <form method="post" action="insert.php" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>

                <!-- Form Name pattern="" insert.php-->
                <legend>
                    <h2>建立新便當</h2>
                </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityName">(必填)品名：</label>
                    <div class="col-md-4">
                        <input id="commodityName" name="commodityName" type="text" placeholder="" class="form-control input-md"
                            maxlength="20">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityStock">存貨數量：</label>
                    <div class="col-md-1">
                        <input type="number" class="form-control stockPriceInput" id="commodityStock" name="commodityStock" min="0" maxlength="5" value="0">
                    </div>
                    
                        <label class="control-label col-md-1" for="commodityPrice">價格：</label>
                    <div class="col-md-1">
                        <input type="number" class="form-control stockPriceInput" id="commodityPrice" name="commodityPrice" min="0" maxlength="5" value="30">
                    </div>
                    

                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityRemarks">備註：</label>
                    <div class="col-md-4">
                        <input id="commodityRemarks" name="commodityRemarks" type="text" placeholder="" class="form-control input-md"
                            maxlength="20">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityPhoto">便當照片：</label>
                    <div class="col-md-4">
                        <input type='file' id="commodityPhoto" name="commodityPhoto" />
                    </div>
                </div>
                <h4>
                    <p class='text-center text-danger'><?php echo $_smarty_tpl->tpl_vars['NoValue']->value;?>
</p>
                </h4>
                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="ok"></label>
                    <div class="col-md-8">
                        <button type="submit" id="ok" name="ok" class="btn btn-success">新增</button>
                        <a href="/index.php" class="btn btn-danger">取消</a>

                    </div>
                </div>

            </fieldset>
        </form>


    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:src.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 src="http://localhost/bookLunch/templates/create.js" defer><?php echo '</script'; ?>
>
</body>

</html><?php }
}
