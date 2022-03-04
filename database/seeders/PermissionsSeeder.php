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
        $adminRole->givePermissionTo($loginPermission);
        $adminRole->givePermissionTo($updateProfilePermission);
        $adminRole->givePermissionTo($showTrainingSessionsPermission);
        $adminRole->givePermissionTo($crudUserPermission);
        $adminRole->givePermissionTo($banUsersPermission);
        $adminRole->givePermissionTo($assignCoachPermission);
        $adminRole->givePermissionTo($buyPackageForUserPermission);
        $adminRole->givePermissionTo($crudCoachPermission);
        $adminRole->givePermissionTo($banCoachPermission);
        $adminRole->givePermissionTo($showPurchasesHistoryPermission);
        $adminRole->givePermissionTo($showRevenuePermission);
        $adminRole->givePermissionTo($crudAttendancePermission);
        $adminRole->givePermissionTo($crudTrainingSessionsPermission);
        $adminRole->givePermissionTo($crudGymPermission);
        $adminRole->givePermissionTo($banGymManagerPermission);
        $adminRole->givePermissionTo($crudGymManagerPermission);
        $adminRole->givePermissionTo($crudCityPermission);
        $adminRole->givePermissionTo($banCityManagerPermission);
        $adminRole->givePermissionTo($crudCityManagerPermission);
        $adminRole->givePermissionTo($crudTrainingPackagePermission);
        #=======================================================================================#
        #			                    give city Manager permissions                           #
        #=======================================================================================#
        $cityManagerRole->givePermissionTo($loginPermission);
        $cityManagerRole->givePermissionTo($updateProfilePermission);
        $cityManagerRole->givePermissionTo($showTrainingSessionsPermission);
        $cityManagerRole->givePermissionTo($crudUserPermission);
        $cityManagerRole->givePermissionTo($banUsersPermission);
        $cityManagerRole->givePermissionTo($assignCoachPermission);
        $cityManagerRole->givePermissionTo($buyPackageForUserPermission);
        $cityManagerRole->givePermissionTo($crudCoachPermission);
        $cityManagerRole->givePermissionTo($banCoachPermission);
        $cityManagerRole->givePermissionTo($showPurchasesHistoryPermission);
        $cityManagerRole->givePermissionTo($showRevenuePermission);
        $cityManagerRole->givePermissionTo($crudAttendancePermission);
        $cityManagerRole->givePermissionTo($crudTrainingSessionsPermission);
        $cityManagerRole->givePermissionTo($crudGymPermission);
        $cityManagerRole->givePermissionTo($banGymManagerPermission);
        $cityManagerRole->givePermissionTo($crudGymManagerPermission);
        #=======================================================================================#
        #			                    give gym Manager permissions                             #
        #=======================================================================================#
        $gymManagerRole->givePermissionTo($loginPermission);
        $gymManagerRole->givePermissionTo($updateProfilePermission);
        $gymManagerRole->givePermissionTo($showTrainingSessionsPermission);
        $gymManagerRole->givePermissionTo($crudUserPermission);
        $gymManagerRole->givePermissionTo($banUsersPermission);
        $gymManagerRole->givePermissionTo($assignCoachPermission);
        $gymManagerRole->givePermissionTo($buyPackageForUserPermission);
        $gymManagerRole->givePermissionTo($crudCoachPermission);
        $gymManagerRole->givePermissionTo($banCoachPermission);
        $gymManagerRole->givePermissionTo($showPurchasesHistoryPermission);
        $gymManagerRole->givePermissionTo($showRevenuePermission);
        $gymManagerRole->givePermissionTo($crudAttendancePermission);
        $gymManagerRole->givePermissionTo($crudTrainingSessionsPermission);
        #=======================================================================================#
        #			                      give user permissions                             	#
        #=======================================================================================#
        $userRole->givePermissionTo($loginPermission);
        $userRole->givePermissionTo($updateProfilePermission);
        $userRole->givePermissionTo($showTrainingSessionsPermission);
        $userRole->givePermissionTo($showAttendanceHistoryPermission);
        $userRole->givePermissionTo($attendTrainingSessionPermission);
        $userRole->givePermissionTo($showRemainingSessionsPermission);
        #=======================================================================================#
        #			                      give coach permissions                             	#
        #=======================================================================================#
        $coachRole->givePermissionTo($loginPermission);
        $coachRole->givePermissionTo($updateProfilePermission);
        $coachRole->givePermissionTo($showTrainingSessionsPermission);
    }
}
