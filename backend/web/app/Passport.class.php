<?php
/**
 * 管理后台通过认证页面
 * @author Yihong Chen <jinglingyueyue@gmail.com>
 * @version 2015/05/01
 * @copyright immomo.com
 */

require_once BACKEND_WEB . '/app/BackendEmpty.class.php';

class PassportPage extends BackendEmpty {

    public function loadHead() {
        $this->staExport('<title>Nebula 后台认证</title>');
    }

    public function action() {
        require_once CODE_BASE . '/app/user/AdminUserNamespace.class.php';
        $this->userInfo = $this->accessVerify();
        if (!empty($this->userInfo) && $this->userInfo['admin_type'] == AdminUserNamespace::TYPE_ADMIN) {
            require_once CODE_BASE . '/util/http/HttpUtil.class.php';
            $loc = HttpUtil::getParam('loc');
            $loc = empty($loc) ? '/' : $loc;
            header('location:' . $loc);
        }

        $this->render('/passport.php');
    }
}
