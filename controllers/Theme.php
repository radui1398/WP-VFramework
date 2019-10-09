<?php

class Theme
{
    private $todo = true;
    private $ajax;
    private $autoHomepage;
    private $hideAdminBar;
    private $woocommerce;
    private $thumbnailWidth;
    private $thumbnailHeight;
    private $thumbnailCrop;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getTodo()
    {
        return $this->todo;
    }

    /**
     * @param mixed $todo
     */
    public function setTodo($todo)
    {
        $this->todo = $todo;
    }

    /**
     * @return mixed
     */
    public function getAjax()
    {
        return $this->ajax;
    }

    /**
     * @param mixed $ajax
     */
    public function setAjax($ajax)
    {
        $this->ajax = $ajax;
    }

    /**
     * @return mixed
     */
    public function getAutoHomepage()
    {
        return $this->autoHomepage;
    }

    /**
     * @param mixed $autoHomepage
     */
    public function setAutoHomepage($autoHomepage)
    {
        $this->autoHomepage = $autoHomepage;
    }

    /**
     * @return mixed
     */
    public function getHideAdminBar()
    {
        return $this->hideAdminBar;
    }

    /**
     * @param mixed $hideAdminBar
     */
    public function setHideAdminBar($hideAdminBar)
    {
        $this->hideAdminBar = $hideAdminBar;
    }

    /**
     * @return mixed
     */
    public function getWoocommerce()
    {
        return $this->woocommerce;
    }

    /**
     * @param mixed $woocommerce
     */
    public function setWoocommerce($woocommerce)
    {
        $this->woocommerce = $woocommerce;
    }

    public function init()
    {
        if ($this->todo == true)
            add_action('admin_notices', array($this, 'todo_notice'));
        if ($this->ajax == true)
            add_action('wp_head', array($this, 'add_localize_script'), 999);
        if ($this->autoHomepage == true)
            $this->createHomepage();
        if ($this->hideAdminBar == true)
            add_filter('show_admin_bar', array($this, 'hide_admin_bar'));
        if ($this->woocommerce == true)
            add_action('after_setup_theme', array($this, 'mytheme_add_woocommerce_support'));
        if ($this->thumbnailWidth && $this->thumbnailHeight)
            add_action('after_setup_theme', array($this,'extraThemeSettings'));

    }


    public function createHomepage()
    {
        if (isset($_GET['activated']) && is_admin()) {

            $new_page_title = 'Homepage';
            $new_page_template = 'pages/page-home.php';

            $page_check = get_page_by_title($new_page_title);
            $new_page = array(
                'post_type' => 'page',
                'post_title' => $new_page_title,
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
            );
            if (!isset($page_check->ID)) {
                $new_page_id = wp_insert_post($new_page);
                if (!empty($new_page_template)) {
                    update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
            }
        }
    }

    public function mytheme_add_woocommerce_support()
    {
        add_theme_support('woocommerce');
    }


    public function todo_notice()
    {
        echo '
        <div class="updated">
            <p>TO DO:</p>
            <p><strong>Change</strong>: Theme details in <em>style.css</em> and <em>script.js</em></p>
            <p><strong>Activate</strong>: Grid file for CSS or just use SCSS (configurate <em>sftp-config.json</em> or
                <em>.vscode/sftp.json</em>
                for SCSS).</p>
            <p><strong>Replace</strong>: <em>screenshot.png</em> with a image of theme.</p>
            <p><strong>Configurate</strong>: <u>DON\'T</u> install any plugins until you configure TGM Plugin Activation
                (configure file is located in <em>../framework/addons/plugins/config.php</em>).</p>
            <p><strong>Activate</strong>: ACF license (the key is: <em>b3JkZXJfaWQ9NDMyMTd8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTEwLTMwIDA3OjU5OjIz</em>).
            </p>
            <p><strong>Configurate</strong>: General file of this theme (file is located in <em>../framework/addons/inc/general.php</em>).
            </p>
            <p><strong>Login</strong>: WPMU Dev Dashboard (<strong>E-mail</strong>: sales@designstoclicks.com | <strong>Password</strong>:
                mura1014).</p>
            <p><strong>Import</strong>: ACF default options (import file is located in <em>../includes/@import/acf_options.json</em>).
            </p>
            <p><strong>Import</strong>: Dummy posts (import file is located in
                <em>../includes/@import/dummy_content.xml</em>).</p>
            <p><strong>Remove</strong>: TO DO (from <?php echo __FILE__; ?>)</p>
            <p>Enjoy &amp; good luck!</p>
        </div>';

    }

    public function add_localize_script()
    {
        ?>
        <script type="text/javascript">
            var jsHomeUrl = '<?php echo home_url(); ?>';
            var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";
        </script>
        <?php
    }


    public function hide_admin_bar()
    {
        return false;
    }

    public function imageSize($name,$width,$height,$crop = false){
        add_image_size($name, $width, $height, $crop);
    }

    public function customThumbnailSize($width,$height,$crop = false){
        $this->thumbnailWidth = $width;
        $this->thumbnailHeight = $height;
        $this->thumbnailCrop = $crop;
    }

    public function extraThemeSettings(){
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size($this->thumbnailWidth, $this->thumbnailHeight, $this->thumbnailCrop);
    }

}

