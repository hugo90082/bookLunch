<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-11 10:31:59
  from 'C:\xampp\htdocs\bookLunch\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d78b0ffbbba55_74196158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd4b2f5ec4e10b5e2169af72cc00e86b918ee5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bookLunch\\templates\\index.html',
      1 => 1568190574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:src.html' => 1,
  ),
),false)) {
function content_5d78b0ffbbba55_74196158 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <div class="container ">
        <div class="row">
            <?php if (!isset($_SESSION['memberID'])) {?>
            <div class="col-md-1">
                <button id="loginStart" type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#loginModal">
                    會員登入
                </button>

                <!-- Modal -->
                <div class="modal fade in active" id="loginModal" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">登入</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="mailLogin">帳號Mail</label>
                                    <input id="mailLogin" name="mailLogin" type="text" placeholder="請輸入帳號mail"
                                        class="form-control input-md" size="30" maxlength="30" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
">
                                </div>
                                <h4>
                                    <p class='text-center text-danger' id="mailValueLogin"></p>
                                </h4>
                                <div class="form-group">
                                    <label class="control-label" for="passwordLogin">密碼</label>
                                    <input id="passwordLogin" name="passwordLogin" type="password" placeholder="請輸入密碼"
                                        class="form-control input-md" size="20" maxlength="20">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="login" name="login" type="button" class="btn btn-primary"
                                    data-dismiss="">登入</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
            <?php }?>
            <?php if (isset($_SESSION['memberID'])) {?>
            <div class="col-md-1">
                <button id="logout" type="button" class="btn btn-md btn-danger">
                    會員登出
                </button>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-success btn-md">
                    會員管理
                </button>
            </div>
            <?php }?>
            <div class="col-md-8">
                <h3 class="text-center text-primary">
                    歡迎！<?php if ($_smarty_tpl->tpl_vars['memberMail']->value) {
echo $_smarty_tpl->tpl_vars['memberMail']->value;
} else {
echo "訪客";
}?>，便當訂起來
                </h3>
            </div>
            <?php if (!isset($_SESSION['memberID'])) {?>
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
                <button id="signUpStart" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#signUpModal">
                    註冊帳號
                </button>
                <!-- Modal -->
                <div class="modal fade in active" id="signUpModal" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">註冊帳號</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="mailSignUp">註冊新帳號Mail</label>
                                    <input id="mailSignUp" name="mailSignUp" type="text" placeholder="請填寫mail 最多三十字"
                                        class="form-control input-md" size="30" maxlength="30" value="<?php echo $_smarty_tpl->tpl_vars['mail']->value;?>
">
                                </div>
                                <h4>
                                    <p class='text-center text-danger' id="mailValueSignUp"></p>
                                </h4>
                                <div class="form-group">
                                    <label class="control-label" for="passwordSignUp">新密碼</label>
                                    <input id="passwordSignUp" name="passwordSignUp" type="password"
                                        placeholder="請填寫英文或數字或符號" class="form-control input-md" size="30"
                                        maxlength="30">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="passwordCheckSignUp">再次確認密碼</label>
                                    <input id="passwordCheckSignUp" name="passwordCheckSignUp" type="password"
                                        placeholder="請填寫英文或數字或符號" class="form-control input-md" size="30"
                                        maxlength="30">
                                </div>
                                <h4>
                                    <p class='text-center text-danger' id="passwordValueSignUp"></p>
                                </h4>
                            </div>
                            <div class="modal-footer">
                                <button id="signUp" name="signUp" type="button" class="btn btn-primary"
                                    data-dismiss="">確定註冊</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php }?>
            <?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] != 1)) {?>
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-warning">
                    訂單管理
                </button>
            </div>
            <?php }?>
            <?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] == 1)) {?>
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
            <?php }?>

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

                        <h3>
                            限量紀念便當
                        </h3>
                        <h5>
                            我是備註哦哦哦哦
                        </h5>
                        <h4 class="pull-right">售價：100元</h4>
                    </div>
                </div>
                <?php if (isset($_SESSION['memberID'])) {?>
                <div class="form-inline">
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
                </div>
                <?php }?>
            </div>
            <?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] == 1)) {?>
            <div class="col-md-1 paddingTopButton">
                <button type="button" class="btn btn-info pull-right">
                    修改
                </button>
            </div>

            <div class="col-md-1 paddingTopButton">
                <button type="button" class="btn btn-danger btn-md pull-right">
                    刪除
                </button>
            </div>
            <?php }?>
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
