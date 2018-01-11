<?php include(BASE_DOMAIN . '/views/header.php');?>

  <!-- Контент страницы -->
  <div class="page page-group">
    <div class="page-content container-fluid">
      <div class="row page-info page-info-group">

        <div class="col-xs-13">
          <ul class="breadcrumbs">
            <li class="active">Группы</li>
          </ul>
        </div>

        <div class="col-xs-13">
          <h1 class="page-title">ГРУППЫ</h1>
        </div>
      </div>

      <div class="row page-group-content">
        <div class="table-wrapper" data-mcs-theme="dark-3">
          <div class="table-content">
            <div class="table-row">
              <div class="table-th table-number right">№ гр.</div>
              <div class="table-th table-name left">Название программы</div>
              <div class="table-th table-start right">Старт</div>
              <div class="table-th table-finish right">Финиш</div>
              <div class="table-th table-student right tooltip" title="Участники">Участн...</div>
            </div>

            <?php foreach ($groupsList as $group):?>
            <div class="table-row">
              <div class="table-td table-number right">
                <a href="<?php echo THE_DOMAIN . 'groups/group-' . $group['numb']?>"><?php echo $group['numb'];?></a>
              </div>
              <div class="table-td table-name left">
                <a href="<?php echo THE_DOMAIN . 'groups/group-' . $group['numb']?>"><?php echo $group['title'];?>
                  <span class="table-start-finish"><?php echo $group['start'];?> - <?php echo $group['start'];?></span>
                </a>
              </div>
              <div class="table-td table-start right">
                <a href="<?php echo THE_DOMAIN . 'groups/group-' . $group['numb']?>"><?php echo $group['start'];?></a>
              </div>
              <div class="table-td table-finish right">
                <a href="<?php echo THE_DOMAIN . 'groups/group-' . $group['numb']?>"><?php echo $group['finish'];?></a>
              </div>
              <div class="table-td table-student right">
                <a href="<?php echo THE_DOMAIN . 'groups/group-' . $group['numb']?>"><?php echo Members::countMembersInGroup($group['numb']);?></a>
              </div>
            </div>
          <?php endforeach;?>

            

          </div>
        </div>
        <a href="<?php echo THE_DOMAIN . 'groups/group-new';?>" class="btn-circle btn-large btn-xs-small btn-fixed waves waves-effect waves-light"><i class="material-icons">add</i></a>
      </div>
    </div>
  </div>


<?php include(BASE_DOMAIN . '/views/footer.php');?>