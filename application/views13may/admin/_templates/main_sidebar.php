<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

            <aside class="main-sidebar">
                <section class="sidebar">
<?php if ($admin_prefs['user_panel'] == TRUE): ?>
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $user_login['firstname'].$user_login['lastname']; ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo lang('menu_online'); ?></a>
                        </div>
                    </div>

<?php endif; ?>
<?php if ($admin_prefs['sidebar_form'] == TRUE): ?>
                    <!-- Search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="<?php echo lang('menu_search'); ?>...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

<?php endif; ?>
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">
						<?php if($this->ion_auth->is_admin()){ ?>
					
                        <li>
                            <a href="<?php echo site_url('/'); ?>">
                                <i class="fa fa-home text-primary"></i> <span><?php echo lang('menu_access_website'); ?></span>
                            </a>
                        </li>

                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('admin/dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span><?php echo lang('menu_dashboard'); ?></span>
                            </a>
                        </li>

                         <li class="header text-uppercase"><?php echo lang('menu_administration'); ?></li>
                      
						<li class="<?=active_link_controller('users')?>">
                            <a href="<?php echo site_url('admin/users'); ?>">
                                <i class="fa fa-user"></i> <span><?php echo lang('menu_users'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('groups')?>">
                            <a href="<?php echo site_url('admin/groups'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo lang('menu_security_groups'); ?></span>
                            </a>
                        </li>
						
                       <!-- <li class="treeview <?=active_link_controller('prefs')?>">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span><?php echo lang('menu_preferences'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?=active_link_function('interfaces')?>"><a href="<?php echo site_url('admin/prefs/interfaces/admin'); ?>"><?php echo lang('menu_interfaces'); ?></a></li>
                            </ul>
                        </li>-->
                        <!--<li class="<?=active_link_controller('files')?>">
                            <a href="<?php echo site_url('admin/files'); ?>">
                                <i class="fa fa-file"></i> <span><?php echo lang('menu_files'); ?></span>
                            </a>
                        </li>-->
                        <!--<li class="<?=active_link_controller('database')?>">
                            <a href="<?php echo site_url('admin/database'); ?>">
                                <i class="fa fa-database"></i> <span><?php echo lang('menu_database_utility'); ?></span>
                            </a>
                        </li>-->


                        <li class="header text-uppercase"><?php echo $title; ?></li>
                        <!--<li class="<?=active_link_controller('license')?>">
                            <a href="<?php echo site_url('admin/license'); ?>">
                                <i class="fa fa-legal"></i> <span><?php echo lang('menu_license'); ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('resources')?>">
                            <a href="<?php echo site_url('admin/resources'); ?>">
                                <i class="fa fa-cubes"></i> <span><?php echo lang('menu_resources'); ?></span>
                            </a>
                        </li>-->
						
						<?php } 
						
						if($this->ion_auth->in_group('college') || $this->ion_auth->is_admin()) {
						
						?>
						<li class="<?=active_link_controller('colleges')?>">
                            <a href="<?php echo site_url('admin/colleges'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Colleges'; ?></span>
                            </a>
                        </li>
						
						
						<li class="<?=active_link_controller('coupons')?>">
                            <a href="<?php echo site_url('admin/coupons/redeem'); ?>">
                                <i class="fa fa-user"></i> <span>Redeem / Enquiry</span>
                            </a>
                        </li>
						
						<?php
						}
						
						if($this->ion_auth->is_admin()){ ?>
						
						<li class="<?=active_link_controller('logo')?>">
                            <a href="<?php echo site_url('admin/colleges/logo'); ?>">
                                <i class="fa fa-shield"></i> <span>Collage Featured</span>
                            </a>
                        </li>
						<li class="<?=active_link_controller('streams')?>">
                            <a href="<?php echo site_url('admin/streams'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Streams'; ?></span>
                            </a>
                        </li>
						
						<li class="<?=active_link_controller('counseling_video')?>">
                            <a href="<?php echo site_url('admin/streams/counseling_video'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Counseling Video'; ?></span>
                            </a>
                        </li>
						
						<!--<li class="<?=active_link_controller('types')?>">
                            <a href="<?php echo site_url('admin/types'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Course Type'; ?></span>
                            </a>
                        </li>-->
						
						<li class="<?=active_link_controller('courses')?>">
                            <a href="<?php echo site_url('admin/courses '); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Courses '; ?></span>
                            </a>
                        </li>
						
						<li class="<?=active_link_controller('courses')?>">
                            <a href="<?php echo site_url('admin/courses/courses_status'); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Course Status '; ?></span>
                            </a>
                        </li>
						
						<li class="<?=active_link_controller('specialization')?>">
                            <a href="<?php echo site_url('admin/specialization '); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Specialization '; ?></span>
                            </a>
                        </li>
						
						
						<li class="header text-uppercase">Coupons and Questions</li>
						<li class="<?=active_link_controller('coupons')?>">
                            <a href="<?php echo site_url('admin/coupons/global_vals'); ?>">
                                <i class="fa fa-user"></i> <span>Coupon Global Vals</span>
                            </a>
                        </li>
						<li class="<?=active_link_controller('coupons')?>">
                            <a href="<?php echo site_url('admin/coupons'); ?>">
                                <i class="fa fa-user"></i> <span>Coupons</span>
                            </a>
                        </li>
					
						<li class="<?=active_link_controller('coupons')?>">
                            <a href="<?php echo site_url('admin/questionnaire'); ?>">
                                <i class="fa fa-user"></i> <span>Questionnaire</span>
                            </a>
                        </li>	
                        
                        <li class="<?=active_link_controller('exams')?>">
                            <a href="<?php echo site_url('admin/exams '); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Exams '; ?></span>
                            </a>
                        </li>
                        <li class="<?=active_link_controller('course_detail')?>">
                            <a href="<?php echo site_url('admin/course_detail '); ?>">
                                <i class="fa fa-shield"></i> <span><?php echo 'Courses Detail '; ?></span>
                            </a>
                        </li>

						<li class="<?=active_link_controller('caller')?>">
                            <a href="<?php echo site_url('admin/caller'); ?>">
                                <i class="fa fa-user"></i> <span><?php echo 'Caller'; ?></span>
                            </a>
                        </li>						

						<?php } ?>	
                    </ul>
                </section>
            </aside>
