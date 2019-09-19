<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-19 11:46:17
  from 'C:\xampp\htdocs\bookLunch\templates\edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d834e6916e5e0_27746611',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8afdcd87182edceb17e6e29b7f297a0beefbeeba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bookLunch\\templates\\edit.html',
      1 => 1568692604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:src.html' => 1,
  ),
),false)) {
function content_5d834e6916e5e0_27746611 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <div class="container">
        <form method="post" action="update.php?CommodityID=<?php echo $_smarty_tpl->tpl_vars['row']->value['CommodityID'];?>
" class="form-horizontal" enctype="multipart/form-data">
            <fieldset>


                <legend>
                    <h2>調整便當內容</h2>
                </legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityName">(必填)品名：</label>
                    <div class="col-md-4">
                        <input id="commodityName" name="commodityName" type="text" placeholder=""
                            class="form-control input-md" maxlength="20" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityStock">存貨數量：</label>
                    <div class="col-md-1">
                        <input type="number" class="form-control stockPriceInput" id="commodityStock"
                            name="commodityStock" min="0" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['stock'];?>
">
                    </div>

                    <label class="control-label col-md-1" for="commodityPrice">價格：</label>
                    <div class="col-md-1">
                        <input type="number" class="form-control stockPriceInput" id="commodityPrice"
                            name="commodityPrice" min="0" maxlength="5" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['price'];?>
">
                    </div>


                </div>



                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityRemarks">備註：</label>
                    <div class="col-md-4">
                        <input id="commodityRemarks" name="commodityRemarks" type="text" placeholder=""
                            class="form-control input-md" maxlength="20" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['commodityRemarks'];?>
">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityPhoto">便當照片：</label>
                    <div class="col-md-8 ">
                        <input type='file' id="commodityPhoto" name="commodityPhoto" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="commodityPhoto">原始照片：</label>
                    <div class="col-md-8 ">
                        <img alt="Bootstrap Image Preview" src="<?php echo $_smarty_tpl->tpl_vars['row']->value['photo'];?>
" class="rounded photoPosition" height="160" width="270"
                            onerror="this.src = 'data:image/jpeg;base64,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'" />

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
                        <button type="submit" id="ok" name="ok" class="btn btn-success">調整</button>
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
