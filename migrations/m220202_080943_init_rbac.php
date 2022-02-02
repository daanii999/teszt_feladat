<?php

use yii\db\Migration;

/**
 * Class m220202_080943_init_rbac
 */
class m220202_080943_init_rbac extends Migration
{
    public function up()
    {
		$auth = Yii::$app->authManager;

        $mg = $auth->createPermission('ManageGroups');
        $mg->description = 'Manage Groups';
        $auth->add($mg);

        $student = $auth->createRole('student');
        $auth->add($student);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $mg);

        $auth->assign($student, 2);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
