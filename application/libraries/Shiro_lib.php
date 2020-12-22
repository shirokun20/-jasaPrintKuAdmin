<?php 

/**
 * 
 */
class Shiro_lib
{
	
	protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function page($content, $data = null)
    {
        return $this->ci->load->view($content, $data);
    }

    public function admin($content, $data = null)
    {
        $datas = array(
            'header'  		=> $this->ci->load->view('admin/template/header', $data, true),
            'sidebar' 		=> $this->ci->load->view('admin/template/sidebar', $data, true),
            'footer'		=> $this->ci->load->view('admin/template/footer', $data, true),
            'breadcrumb'	=> $this->ci->load->view('admin/template/breadcrumb', $data, true),
            'content' 		=> $this->ci->load->view('admin/template/' . $content, $data, true),
        );
        return $this->ci->load->view('admin/template/page', $datas);
    }
}