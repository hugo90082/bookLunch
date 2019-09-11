<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-11 03:48:50
  from 'C:\xampp\htdocs\bookLunch\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d785282911189_26867412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd4b2f5ec4e10b5e2169af72cc00e86b918ee5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bookLunch\\templates\\index.html',
      1 => 1568166520,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:src.html' => 1,
  ),
),false)) {
function content_5d785282911189_26867412 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <div class="container ">
        <div class="row">
            <div class="col-md-1">
                <button type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#myModal">
                    會員登入
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
    
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">登入</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
    
                        </div>
                    </div>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-md" >
                    會員管理
                </button>


            </div>
            <div class="col-md-8">
                <h1 class="text-center text-primary">
                    便當訂起來
                </h1>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-warning">
                    訂單管理
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-primary">
                    新增品項
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 paddingTop">
                <img alt="Bootstrap Image Preview"
                    src="https://s.yimg.com/ny/api/res/1.2/xgHHgkEdYbOrPewQZxk5ZA--~A/YXBwaWQ9aGlnaGxhbmRlcjtzbT0xO3c9ODAw/http://media.zenfs.com/zh-Hant-TW/homerun/ftvn.com.tw/0a8050854441c70640ca651fdbf13ec1"
                    class="rounded" height="160" />
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12">

                        <h2>
                            限量紀念便當
                        </h2>
                        <h5>
                            我是備註哦哦哦哦
                        </h5>
                        <h4 class="pull-right">售價：100元</h4>
                    </div>
                </div>

                <form class="form-inline" action="">
                    <div class="form-group col-md-4">
                        數量：<input type="number" class="form-control amount" id="amount" min="0" max="50" maxlength="1"
                            value="0">個

                        <p class="text-danger">限制最大數量50個</p>

                    </div>
                    <div class="form-group col-md-6">
                        備註：
                        <input maxlength="20" size="20" class="form-control" id="transactionRemarks">
                    </div>
                    <div class="form-group col-md-1">
                        <button type="button" class="btn btn-success">
                            購買
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-1 paddingTopButton">
                <button type="button" class="btn btn-info">
                    修改
                </button>
            </div>

            <div class="col-md-1 paddingTopButton">
                <button type="button" class="btn btn-danger btn-md">
                    刪除
                </button>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:src.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 src="http://localhost/bookLunch/templates/index.js" defer><?php echo '</script'; ?>
>
</body>

</html><?php }
}
