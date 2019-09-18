<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-18 11:54:36
  from 'C:\xampp\htdocs\bookLunch\templates\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d81fedc310f21_72586180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dd4b2f5ec4e10b5e2169af72cc00e86b918ee5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bookLunch\\templates\\index.html',
      1 => 1568800460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html' => 1,
    'file:src.html' => 1,
  ),
),false)) {
function content_5d81fedc310f21_72586180 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
    <div class="container ">
        <div class="row">
            <?php if (!isset($_SESSION['memberID'])) {?>
            <div class="col-md-1">
                <button id="loginStart" type="button" class="btn btn-md btn-danger" data-toggle="modal"
                    data-target="#loginModal">
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
                <button type="button" class="btn btn-success btn-md" data-toggle="modal"
                    data-target="#memberManagementModal">
                    會員管理
                </button>
                <div class="modal fade in active" id="memberManagementModal" role="dialog">
                    <div class="modal-dialog modal-sm">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">會員資料管理 -- 密碼變更</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="passwordMemberManagement">請輸入舊密碼</label>
                                    <input id="passwordMemberManagement" name="passwordMemberManagement" type="password"
                                        placeholder="請輸入密碼" class="form-control input-md" size="20" maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="newPasswordMemberManagement">請輸入新密碼</label>
                                    <input id="newPasswordMemberManagement" name="newPasswordMemberManagement"
                                        type="password" placeholder="請輸入密碼" class="form-control input-md" size="20"
                                        maxlength="20">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="newCheckPasswordMemberManagement">請再次確認新密碼</label>
                                    <input id="newCheckPasswordMemberManagement" name="newCheckPasswordMemberManagement"
                                        type="password" placeholder="請輸入密碼" class="form-control input-md" size="20"
                                        maxlength="20">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="updatePasswordMemberManagement" name="updatePasswordMemberManagement"
                                    type="button" class="btn btn-danger" data-dismiss="">變更密碼</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php }?>
            <div class="col-md-8">
                <h3 class="text-center text-primary">
                    歡迎！<?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] === '1')) {
echo "管理員 ";
} else {
echo '';
}?>
                    <?php if ($_smarty_tpl->tpl_vars['memberMail']->value) {
echo $_smarty_tpl->tpl_vars['memberMail']->value;
} else {
echo "訪客";
}?>，便當訂起來
                </h3>
                <input type="hidden" id="memberID" name="memberID" value="<?php echo $_SESSION['memberID'];?>
">

            </div>
            <?php if (!isset($_SESSION['memberID'])) {?>
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
                <button id="signUpStart" type="button" class="btn btn-success btn-md" data-toggle="modal"
                    data-target="#signUpModal">
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
            <?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] !== '1')) {?>

            <div class="col-md-1">
                <button type="button" class="btn btn-warning">
                    訂單管理
                </button>
            </div>
            <div class="col-md-1">
            </div>
            <?php }?>
            <?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] === '1')) {?>
            <div class="col-md-1">
                <button type="button" class="btn btn-warning">
                    訂單管理
                </button>
            </div>
            <div class="col-md-1">
                <a href="./create.php" class="btn btn-primary">
                    新增品項
                </a>
            </div>
            <?php }?>

        </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>

        <div class="row paddingTop" id="dataRow<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
">
            <div class="col-md-3 paddingTop">

                <img alt="Bootstrap Image Preview" src="<?php echo $_smarty_tpl->tpl_vars['data']->value['photo'];?>
" class="rounded" height="160" width="270"
                    onerror="this.src = 'data:image/jpeg;base64,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'" />
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>

                            <h4>
                                <div class="pull-right">剩餘：<?php echo $_smarty_tpl->tpl_vars['data']->value['stock'];?>
個</div>
                            </h4>
                        </h3>
                        <h5>
                            <?php echo $_smarty_tpl->tpl_vars['data']->value['commodityRemarks'];?>

                        </h5>
                        <h4 class="pull-right">售價：<?php echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
元</h4>
                    </div>
                </div>
                <?php if (isset($_SESSION['memberID'])) {?>
                <div class="form-inline">
                    <div class="form-group col-md-4">
                        數量：<input type="number" class="form-control amount" id="amount<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
" name="amount<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
" min="0"
                            max="50" maxlength="1" value="0">個

                        <p class="text-danger">限制最大數量50個</p>

                    </div>
                    <div class="form-group col-md-7">
                        備註：
                        <input maxlength="20" size="20" class="form-control"
                            id="transactionRemarks<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
">
                        <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
">
                        <button type="button" class="btn btn-success buyButton" id="buyButton<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
">
                            購買
                        </button>
                    </div>
                </div>
                <?php }?>
            </div>
            <?php if (isset($_SESSION['memberID']) && ($_SESSION['memberID'] === '1')) {?>

            <div class="col-md-1">

                <a href="edit.php?CommodityID=<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
" class="btn btn-xs btn-info pull-right editButton">
                    <span class="glyphicon glyphicon-pencil"></span>修改
                </a>


                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['CommodityID'];?>
">
                <button type="button" class="btn btn-danger btn-xs pull-right deleteButton">
                    <span class="glyphicon glyphicon-remove"></span>刪除
                </button>

            </div>
            <?php }?>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:src.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 src="http://localhost/bookLunch/templates/index.js" defer><?php echo '</script'; ?>
>
</body>

</html><?php }
}
