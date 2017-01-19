<div id="sidebar" class="sidebar responsive ace-save-state">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="ace-icon fa fa-address-book"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="" id="Pages">
            <a href="/">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>

            <b class="arrow"></b>
        </li>
        <li class="" id="Questions">
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
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).'  List Question',
                        ['controller'=>'questions','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li id="add">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).'  New Question',
                        ['controller'=>'questions','action'=>'add'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('  Export Question'),
                        ['controller'=>'questions','action'=>'exportQuestion'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('  Export Answer'),
                        ['controller'=>'questions','action'=>'exportAnswer'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('  Import'),
                        ['controller'=>'questions','action'=>'import'],
                        ['escape'=>false])?>

                </li>
            </ul>
        </li>
        <li class="" id="Quizs">
            <?= $this->Html->link(
                $this->Html->tag('i','',['class'=>'menu-icon fa fa-list-alt'])
                .$this->Html->tag('span',__('Test Review'),
                    ['class'=>'menu-text']),
                ['controller'=>'quizs','action'=>'index'],
                ['escape'=>false])?>
        </li>
        <li class="" id="Candidates">
            <?= $this->Html->link(
                $this->Html->tag('i','',['class'=>'menu-icon fa fa-users'])
                .$this->Html->tag('span',__('Candidate'),
                    ['class'=>'menu-text']).$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                '',
                ['class'=>'dropdown-toggle','escape'=>false])?>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="" id="index">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('List Candidate'),
                        ['controller'=>'candidates','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="" id="add">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('Add Candidate'),
                        ['controller'=>'candidates','action'=>'add'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
            </ul>
        </li>
        <li class="" id="Users">
            <?= $this->Html->link(
                    $this->Html->tag('i','',['class'=>'menu-icon fa fa-user-o'])
                    .$this->Html->tag('span',__('User'),
                        ['class'=>'menu-text']).$this->Html->tag('b','',['class'=>'arrow fa fa-angle-down']),
                ['controller'=>'users','action'=>'#'],
                ['class'=>'dropdown-toggle','escape'=>false])?>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="" id="index">
                    <?= $this->Html->link(
                        $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('List User'),
                        ['controller'=>'users','action'=>'index'],
                        ['escape'=>false])?>

                    <b class="arrow"></b>
                </li>
                <li class="" id="add">
                    <?= $this->Html->link(
                            $this->Html->tag('i','',['class'=>'menu-icon fa fa-caret-right']).__('Add User'),
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
    <?=$this->request->params['action']?>
</div>