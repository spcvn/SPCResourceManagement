<style type="text/css">
    .welcome-logo .content div:first-child{
        text-align: left;
    }
</style>
<div class="logo welcome-logo">
    <?=$this->Html->image('logo.png',['class'=>'logo-company', 'alt'=>''])?>
    <hr/>
    <div class="content">
        <div class="col-sm-7">
            <div class="widget-box transparent" id="recent-box">
                <div class="widget-header">
                    <h4 class="widget-title lighter smaller">
                        <i class="ace-icon fa fa-rss orange"></i>RECENT
                    </h4>

                    <div class="widget-toolbar no-border">  
                        <ul class="nav nav-tabs" id="recent-tab">
                            <li class="active">
                                <a data-toggle="tab" href="#task-tab">Interview list</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#member-tab">Members</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#comment-tab">Comments</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-4">
                        <div class="tab-content padding-8">
                            <div id="task-tab" class="tab-pane active">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>    
                                            <th>Interview Date</th>    
                                            <th>Status</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        /*echo "<pre>";
                                        print_r($arrRecent['listCandidate']);
                                        echo "</pre>";*/

                                        foreach ($arrRecent['listCandidate'] as $candidate) {
                                            echo "<tr>
                                                <td>$candidate->first_name $candidate->last_name</td>
                                                <td>$candidate->interview_date</td>
                                                <td></td>
                                            <tr/>";
                                        }
                                    ?>
                                    </tbody>


                                </table>
                                
                            </div><!-- End candidate list -->

                            <div id="member-tab" class="tab-pane">
                                <div class="clearfix">
                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Bob Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Bob Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">20 min</span>
                                            </div>

                                            <div>
                                                <span class="label label-warning label-sm">pending</span>

                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                        <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
                                                                <span class="green">
                                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
                                                                <span class="orange">
                                                                    <i class="ace-icon fa fa-times bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                <span class="red">
                                                                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Joe Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Joe Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">1 hour</span>
                                            </div>

                                            <div>
                                                <span class="label label-warning label-sm">pending</span>

                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                        <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
                                                                <span class="green">
                                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
                                                                <span class="orange">
                                                                    <i class="ace-icon fa fa-times bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                <span class="red">
                                                                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Jim Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Jim Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">2 hour</span>
                                            </div>

                                            <div>
                                                <span class="label label-warning label-sm">pending</span>

                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-yellow btn-no-border dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                        <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
                                                                <span class="green">
                                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
                                                                <span class="orange">
                                                                    <i class="ace-icon fa fa-times bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                <span class="red">
                                                                    <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Alex Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Alex Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">3 hour</span>
                                            </div>

                                            <div>
                                                <span class="label label-danger label-sm">blocked</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Bob Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Bob Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">6 hour</span>
                                            </div>

                                            <div>
                                                <span class="label label-success label-sm arrowed-in">approved</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Susan's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Susan</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">yesterday</span>
                                            </div>

                                            <div>
                                                <span class="label label-success label-sm arrowed-in">approved</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Phil Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Phil Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">2 days ago</span>
                                            </div>

                                            <div>
                                                <span class="label label-info label-sm arrowed-in arrowed-in-right">online</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv memberdiv">
                                        <div class="user">
                                            <img alt="Alexa Doe's avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Alexa Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">3 days ago</span>
                                            </div>

                                            <div>
                                                <span class="label label-success label-sm arrowed-in">approved</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-4"></div>

                                <div class="center">
                                    <i class="ace-icon fa fa-users fa-2x green middle"></i>

                                    &nbsp;
                                    <a href="#" class="btn btn-sm btn-white btn-info">
                                        See all members &nbsp;
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>

                                <div class="hr hr-double hr8"></div>
                            </div><!-- /.#member-tab -->

                            <div id="comment-tab" class="tab-pane">
                                <div class="comments">
                                    <div class="itemdiv commentdiv">
                                        <div class="user">
                                            <img alt="Bob Doe's Avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Bob Doe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="green">6 min</span>
                                            </div>

                                            <div class="text">
                                                <i class="ace-icon fa fa-quote-left"></i>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                            </div>
                                        </div>

                                        <div class="tools">
                                            <div class="inline position-relative">
                                                <button class="btn btn-minier bigger btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                    <i class="ace-icon fa fa-angle-down icon-only bigger-120"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                    <li>
                                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Approve">
                                                            <span class="green">
                                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-warning" data-rel="tooltip" title="Reject">
                                                            <span class="orange">
                                                                <i class="ace-icon fa fa-times bigger-110"></i>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                            <span class="red">
                                                                <i class="ace-icon fa fa-trash-o bigger-110"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv commentdiv">
                                        <div class="user">
                                            <img alt="Jennifer's Avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Jennifer</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="blue">15 min</span>
                                            </div>

                                            <div class="text">
                                                <i class="ace-icon fa fa-quote-left"></i>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                            </div>
                                        </div>

                                        <div class="tools">
                                            <div class="action-buttons bigger-125">
                                                <a href="#">
                                                    <i class="ace-icon fa fa-pencil blue"></i>
                                                </a>

                                                <a href="#">
                                                    <i class="ace-icon fa fa-trash-o red"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv commentdiv">
                                        <div class="user">
                                            <img alt="Joe's Avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Joe</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="orange">22 min</span>
                                            </div>

                                            <div class="text">
                                                <i class="ace-icon fa fa-quote-left"></i>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                            </div>
                                        </div>

                                        <div class="tools">
                                            <div class="action-buttons bigger-125">
                                                <a href="#">
                                                    <i class="ace-icon fa fa-pencil blue"></i>
                                                </a>

                                                <a href="#">
                                                    <i class="ace-icon fa fa-trash-o red"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="itemdiv commentdiv">
                                        <div class="user">
                                            <img alt="Rita's Avatar" src="/ace_theme/images/avatars/default-user-icon.png" />
                                        </div>

                                        <div class="body">
                                            <div class="name">
                                                <a href="#">Rita</a>
                                            </div>

                                            <div class="time">
                                                <i class="ace-icon fa fa-clock-o"></i>
                                                <span class="red">50 min</span>
                                            </div>

                                            <div class="text">
                                                <i class="ace-icon fa fa-quote-left"></i>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis &hellip;
                                            </div>
                                        </div>

                                        <div class="tools">
                                            <div class="action-buttons bigger-125">
                                                <a href="#">
                                                    <i class="ace-icon fa fa-pencil blue"></i>
                                                </a>

                                                <a href="#">
                                                    <i class="ace-icon fa fa-trash-o red"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="hr hr8"></div>

                                <div class="center">
                                    <i class="ace-icon fa fa-comments-o fa-2x green middle"></i>

                                    &nbsp;
                                    <a href="#" class="btn btn-sm btn-white btn-info">
                                        See all comments &nbsp;
                                        <i class="ace-icon fa fa-arrow-right"></i>
                                    </a>
                                </div>

                                <div class="hr hr-double hr8"></div>
                            </div>
                        </div>
                    </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
        </div><!-- /.col -->

        <div class="col-sm-5">
            <div class="infobox infobox-green">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-users"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?=$arrCounter['candidates']?></span>
                    <div class="infobox-content"><?=__("Candidates")?></div>
                </div>

                <div class="stat stat-success">8%</div>
            </div>

            <div class="infobox infobox-pink">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-user"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?=$arrCounter['users']?></span>
                    <div class="infobox-content">Users</div>
                </div>
                <div class="stat stat-important">4%</div>
            </div>

            <div class="infobox infobox-blue">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-twitter"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?=$arrCounter['questions']?></span>
                    <div class="infobox-content">Questions</div>
                </div>

                <div class="badge badge-success">
                    +32%
                    <i class="ace-icon fa fa-arrow-up"></i>
                </div>
            </div>
            

            <div class="infobox infobox-red">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-flask"></i>
                </div>

                <div class="infobox-data">
                    <span class="infobox-data-number"><?=$arrCounter['examtempate']?></span>
                    <div class="infobox-content">Exam Templates</div>
                </div>
            </div>


            <div class="space-6"></div>

            <div class="infobox infobox-green infobox-small infobox-dark">
                <div class="infobox-progress">
                    <div class="easy-pie-chart percentage" data-percent="<?=$arrCounter['quiz']['ratio']?>" data-size="39">
                        <span class="percent"><?=$arrCounter['quiz']['ratio']?></span>%
                    </div>
                </div>

                <div class="infobox-data">
                    <div class="infobox-content">Test</div>
                    <div class="infobox-content"><?=$arrCounter['quiz']['comp']?>/<?=$arrCounter['quiz']['all']?></div>
                </div>
            </div>

            <div class="infobox infobox-blue infobox-small infobox-dark">
                <div class="infobox-chart">
                    <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                </div>

                <div class="infobox-data">
                    <div class="infobox-content">Earnings</div>
                    <div class="infobox-content">$32,000</div>
                </div>
            </div>

            <div class="infobox infobox-grey infobox-small infobox-dark">
                <div class="infobox-icon">
                    <i class="ace-icon fa fa-download"></i>
                </div>

                <div class="infobox-data">
                    <div class="infobox-content">Downloads</div>
                    <div class="infobox-content">1,205</div>
                </div>
            </div>
        </div>
    </div>
</div>
