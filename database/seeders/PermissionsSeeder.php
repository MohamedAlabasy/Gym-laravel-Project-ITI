<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #=======================================================================================#
        #			               Reset cached roles and permissions                          	#
        #=======================================================================================#
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        #=======================================================================================#
        #			                         create permissions                              	#
        #=======================================================================================#
        $loginPermission = Permission::create(['name' => 'login']);
        $updateProfilePermission = Permission::create(['name' => 'updateProfile']);
        $showTrainingSessionsPermission = Permission::create(['name' => 'showTrainingSessions']);
        $showAttendanceHistoryPermission = Permission::create(['name' => 'showAttendanceHistory']);
        $attendTrainingSessionPermission = Permission::create(['name' => 'attendTrainingSession']);
        $showRemainingSessionsPermission = Permission::create(['name' => 'showRemainingSessions']);
        $crudUserPermission = Permission::create(['name' => 'crudUser']);
        $banUsersPermission = Permission::create(['name' => 'banUsers']);
        $assignCoachPermission = Permission::create(['name' => 'assignCoach']);
        $buyPackageForUserPermission = Permission::create(['name' => 'buyPackageForUser']);
        $crudCoachPermission = Permission::create(['name' => 'crudCoach']);
        $banCoachPermission = Permission::create(['name' => 'banCoach']);
        $showPurchasesHistoryPermission = Permission::create(['name' => 'showPurchasesHistory']);
        $showRevenuePermission = Permission::create(['name' => 'showRevenue']);
        $crudAttendancePermission = Permission::create(['name' => 'crudAttendance']);
        $crudTrainingSessionsPermission = Permission::create(['name' => 'crudTrainingSessions']);
        $crudGymPermission = Permission::create(['name' => 'crudGym']);
        $banGymManagerPermission = Permission::create(['name' => 'banGymManager']);
        $crudGymManagerPermission = Permission::create(['name' => 'crudGymManager']);
        $crudCityPermission = Permission::create(['name' => 'crudCity']);
        $banCityManagerPermission = Permission::create(['name' => 'banCityManager']);
        $crudCityManagerPermission = Permission::create(['name' => 'crudCityManager']);
        $crudTrainingPackagePermission = Permission::create(['name' => 'crudTrainingPackage']);
        #=======================================================================================#
        #			                            create roles                                  	#
        #=======================================================================================#
        $adminRole = Role::create(['name' => 'admin']);
        $cityManagerRole = Role::create(['name' => 'cityManager']);
        $gymManagerRole = Role::create(['name' => 'gymManager']);
        $coachRole = Role::create(['name' => 'coach']);
        $userRole = Role::create(['name' => 'user']);
        #=======================================================================================#
        #			                      give admin permissions                             	#
        #=======================================================================================#
        $adminRole->syncPermissions([
            $loginPermission,
            $updateProfilePermission,
            $showTrainingSessionsPermission,
            $crudUserPermission,
            $banUsersPermission,
            $assignCoachPermission,
            $buyPackageForUserPermission,
            $crudCoachPermission,
            $banCoachPermission,
            $showPurchasesHistoryPermission,
            $showRevenuePermission,
            $crudAttendancePermission,
            $crudTrainingSessionsPermission,
            $crudGymPermission,
            $banGymManagerPermission,
            $crudGymManagerPermission,
            $crudCityPermission,
            $banCityManagerPermission,
            $crudCityManagerPermission,
            $crudTrainingPackagePermission
        ]);

        #=======================================================================================#
        #			                    give city Manager permissions                           #
        #=======================================================================================#
        $cityManagerRole->syncPermissions([
            $loginPermission,
            $updateProfilePermission,
            $showTrainingSessionsPermission,
            $crudUserPermission,
            $banUsersPermission,
            $assignCoachPermission,
            $buyPackageForUserPermission,
            $crudCoachPermission,
            $banCoachPermission,
            $showPurchasesHistoryPermission,
            $showRevenuePermission,
            $crudAttendancePermission,
            $crudTrainingSessionsPermission,
            $crudGymPermission,
            $banGymManagerPermission,
            $crudGymManagerPermission
        ]);
        #=======================================================================================#
        #			                    give gym Manager permissions                            #
        #=======================================================================================#
        $gymManagerRole->syncPermissions([
            $loginPermission,
            $updateProfilePermission,
            $showTrainingSessionsPermission,
            $crudUserPermission,
            $banUsersPermission,
            $assignCoachPermission,
            $buyPackageForUserPermission,
            $crudCoachPermission,
            $banCoachPermission,
            $showPurchasesHistoryPermission,
            $showRevenuePermission,
            $crudAttendancePermission,
            $crudTrainingSessionsPermission,
        ]);
        #=======================================================================================#
        #			                      give user permissions                             	#
        #=======================================================================================#
        $userRole->syncPermissions([
            $loginPermission,
            $updateProfilePermission,
            $showTrainingSessionsPermission,
            $showAttendanceHistoryPermission,
            $attendTrainingSessionPermission,
            $showRemainingSessionsPermission,
        ]);
        #=======================================================================================#
        #			                      give coach permissions                             	#
        #=======================================================================================#
        $coachRole->syncPermissions([
            $loginPermission,
            $updateProfilePermission,
            $showTrainingSessionsPermission,
        ]);
    }
}
