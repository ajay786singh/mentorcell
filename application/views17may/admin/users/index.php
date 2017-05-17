<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <div class="content-wrapper">
                <section class="content-header">
                    <?php echo $pagetitle; ?>
                    <?php echo $breadcrumb; ?>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                             <div class="box">
                                <div class="box-header with-border">
                                    <?php echo anchor('admin/users/create', '<i class="fa fa-plus"></i> '. lang('users_create_user'), array('class' => 'btn  btn-primary btn-flat')); ?><?php echo anchor('admin/users/exports_data', '<i class="fa fa-plus"></i> Export to Excel', array('class' => 'btn  btn-primary btn-flat pull-right')); ?>
                                </div>
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th><?php echo lang('users_firstname');?></th>
                                                <th><?php echo lang('users_lastname');?></th>
                                                <th><?php echo lang('users_email');?></th>
                                                <th><?php echo lang('users_groups');?></th>
                                                <th><?php echo lang('users_status');?></th>
                                                <th><?php echo lang('users_action');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php foreach ($users as $user):?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                                <td>
<?php foreach ($user->groups as $group):?>
                                                    <?php echo anchor('admin/groups/edit/'.$group->id, '<span class="label" style="background:'.$group->bgcolor.';">'.htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8').'</span>'); ?>
<?php endforeach?>
                                                </td>
                                                <td><?php echo ($user->active) ? anchor('admin/users/deactivate/'.$user->id, '<span class="label label-success">'.lang('users_active').'</span>') : anchor('admin/users/activate/'. $user->id, '<span class="label label-default">'.lang('users_inactive').'</span>'); ?></td>
                                                <td>
                                                <?php echo anchor('admin/users/edit/'.$user->id, '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'); ?>
												&nbsp;	| &nbsp;
												<?php echo anchor('admin/users/profile/'.$user->id, '<i class="fa fa-eye" aria-hidden="true"></i>'); ?>
												&nbsp;	| &nbsp;
												<?php echo anchor('admin/users/delete/'.$user->id, '<i class="fa fa-trash" aria-hidden="true"></i>'); ?>
                                                </td>
                                            </tr>
<?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                    </div>
                </section>
            </div>
