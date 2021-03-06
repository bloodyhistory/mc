<?php

/**
 * MobileCMS
 *
 * Open source content management system for mobile sites
 *
 * @author MobileCMS Team <support@mobilecms.pro>
 * @copyright Copyright (c) 2011-2019, MobileCMS Team
 * @link https://mobilecms.pro Official site
 * @license MIT license
 */


//---------------------------------------------

/**
 * Контроллер страниц
 */
class Pages_Controller extends Controller
{

    /**
     * Уровень пользовательского доступа
     */
    public $access_level = 0;

    /**
     * Метод по умолчанию
     */
    public function action_index()
    {
        $this->action_view_page();
    }

    /**
     * Просмотр страницы
     */
    public function action_view_page()
    {
        $page_id = intval($_GET['page_id']);

        if (!$page = $this->db->get_row("SELECT * FROM #__pages WHERE page_id = '" . intval($page_id) . "'"))
            a_error('Запрашиваемой страницы не существует!');

        $page['content'] = main::bbcode(nl2br($page['content']));

        $this->tpl->assign(array(
            'page' => $page
        ));

        $this->tpl->display('view_page');
    }

}

?>