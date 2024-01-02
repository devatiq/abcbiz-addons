<?php
namespace ABCBiz\Includes\Widgets;

use Elementor\Widget_Base;

class BaseWidget extends Widget_base
{
    protected $name;
    protected $title;
    protected $icon;
    protected $categories = [];
    protected $keywords = [];

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_title()
    {
        return __($this->title, 'abcbiz-multi');
    }

    public function get_icon()
    {
        return $this->icon;
    }

    public function get_categories()
    {
        return $this->categories;
    }

	/**
	 * Get widget keywords.
	 */
	public function get_keywords() {
		return $this->keywords;
	}

}
