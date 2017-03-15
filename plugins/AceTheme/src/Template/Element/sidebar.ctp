<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <h5 class="ttlsb""><?= __('menu')?></h5>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="Pages" id="">
            <a href="/">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="Candidates" id="">
            <?= $this->Html->link(
                $this->Html->tag('i','',['class'=>'menu-icon fa fa-users'])
                .$this->Html->tag('span',__('candidate'),
                    ['class'=>'menu-text']).$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                '',
                ['class'=>'dropdown-toggle','escape'=>false])?>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="" id="index">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('list_candidate'),
                        ['controller'=>'candidates','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="" id="add">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('add_candidate'),
                        ['controller'=>'candidates','action'=>'add'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>

        <li class="Examstemplates">
            <?= $this->Html->link(
                $this->Html->tag('i','',['class'=>'menu-icon fa fa-list-alt'])
                .$this->Html->tag('span',__('Exam'),
                    ['class'=>'menu-text']).$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                '',
                ['class'=>'dropdown-toggle','escape'=>false])?>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="" id="Quizs_index">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('test_list'),
                        ['controller'=>'quizs','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="Examstemplates">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right'])
                        .$this->Html->tag('span',__('exam_template'),['class'=>'menu-text'])
                        .$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                        [],
                        ['class'=>'dropdown-toggle','escape'=>false])?>

                    <b class="arrow"></b>
                    <ul class="submenu">
                        <li class="" id="index">
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('list'),
                                ['controller'=>'examstemplates','action'=>'index'],
                                ['escape'=>false])?>

                            <b class="arrow"></b>
                        </li>
                        <li class="" id="add">
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('add'),
                                ['controller'=>'examstemplates','action'=>'add'],
                                ['escape'=>false])?>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="" id="examAssignment">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('exam_assignment'),
                        ['controller'=>'examstemplates','action'=>'exam_assignment'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>

            </ul>
        </li>

        <li class="Questions">
            <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'menu-icon fa fa-question-circle'])
                    .$this->Html->tag('span',__('Question'),['class'=>'menu-text'])
                    .$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                ['controller'=>'questions','action'=>'#'],
                ['class'=>'dropdown-toggle', 'escape'=>false])?>

            <b class="arrow"></b>

            <ul class="submenu" >
                <li id="index">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('list_question'),
                        ['controller'=>'questions','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li id="add">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('new_question'),
                        ['controller'=>'questions','action'=>'add'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <!-- <li>
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right'])
                        .$this->Html->tag('span',__('Report'),['class'=>'menu-text'])
                        .$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                        ['controller'=>'questions','action'=>'#'],
                        ['class'=>'dropdown-toggle', 'escape'=>false])?>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="">
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('export_question'),
                                ['controller'=>'questions','action'=>'exportQuestion'],
                                ['escape'=>false])?>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('export_answer'),
                                ['controller'=>'questions','action'=>'exportAnswer'],
                                ['escape'=>false])?>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <?= $this->Html->link(
                                $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('import'),
                                ['controller'=>'questions','action'=>'import'],
                                ['escape'=>false])?>

                        </li>
                    </ul>
                </li> -->
            </ul>
        </li>
        

        
        <li class="Users" id="">
            <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'menu-icon fa fa-user-o'])
                    .$this->Html->tag('span',__('user'),
                        ['class'=>'menu-text']).$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                ['controller'=>'users','action'=>'#'],
                ['class'=>'dropdown-toggle','escape'=>false])?>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="" id="index">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('list_user'),
                        ['controller'=>'users','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="" id="add">
                    <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('add_user'),
                        ['controller'=>'users','action'=>'add'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>


    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>