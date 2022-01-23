<div id="sb-search" class="sb-search">
  <form role="search" method="get" action="<?php echo home_url('/') ?>">
    <input type='hidden' value='1' name='n_f_temp_id'>
    <input name='s' id="s" value="<?php echo get_search_query() ?>" placeholder="Поиск..." type="text" class="sb-search-input" />
    <span class="sb-search-inp">
      <input class="sb-search-submit" type="submit" value="">
      <i class="fa fa-search"></i>
    </span>
    <span class="sb-icon-search">
      <i class="fa fa-search"></i>
    </span>
  </form>
</div>