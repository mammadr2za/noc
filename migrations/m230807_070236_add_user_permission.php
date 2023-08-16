<?php

use yii\db\Migration;

/**
 * Class m230807_070236_add_user_permission
 */
class m230807_070236_add_user_permission extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;
        // Create the permission
        $permission = $auth->createPermission('userPermission');
        $permission->description = 'User Permission';
        $auth->add($permission);
        
        // Assign the permission to the user
        $userRole = $auth->getRole('guest');
        $auth->addChild($userRole, $permission);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;
        
        // Remove the permission
        $permission = $auth->getPermission('userPermission');
        $auth->remove($permission);
    }
}