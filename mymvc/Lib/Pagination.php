<?php 
	
	class Pagination {

		private $js_func_name;
		private $js_func_params;

		private $cur_page;
		private $per_page;
		private $total;

		private $display_scale = 10;

		public function __construct($cur_page = 1, $per_page = 3, $total = 0, $js_func_name, $js_func_params = NULL) {

			$this->js_func_name = $js_func_name;
			$this->js_func_params = '';

			if ($js_func_params !== NULL) {
				foreach ($js_func_params as $param) {
					$this->js_func_params .= $param . ', ';
				}
			}

			$this->cur_page = $cur_page;
			$this->per_page = $per_page;
			$this->total = $total;

			if(($total != 0) && ($this->cur_page < 1 || $this->cur_page > $this->page_count()))
				die('invalid page params error');

		}

		private function get_js_func($page) {

			//return $this->js_func_name . '(' . $this->js_func_params . $page . ')';
			return $this->js_func_name . '&page=' . $page;

		}

		/*
		* 返回页数
		*/
		public function page_count() {

			return (int)(($this->total / $this->per_page) + ($this->total % $this->per_page === 0 ? 0 : 1));

		}

		public function offset() {

			return ($this->cur_page - 1) * $this->per_page;

		}

		public function previous() {

			list($left, $right) = $this->get_left_right();

			return $left - 1;

		}

		public function next() {

			list($left, $right) = $this->get_left_right();
			return $right + 1;

		}

		public function has_previous() {

			return $this->previous() >= 1;

		}

		public function has_next() {

			return $this->next() <= $this->page_count();

		}

		public function get_left_right() {

			$left = (int)(($this->cur_page - 1) / $this->display_scale) * $this->display_scale + 1;

			//$ref_right_offset = $this->display_scale - $this->cur_page % $this->display_scale;
			$right = $left + $this->display_scale - 1;

			$left = $left <= 1 ? 1 : $left;
			$right = $right >= $this->page_count() ? $this->page_count() : $right;

			return array($left, $right);

		}

		/*
		* 分区段的页数链接
		* «首页... « 2 3 4 » ...尾页»
		*/
		public function advanced_page_link() {

			list($left, $right) = $this->get_left_right();

			//$li_style = "style=\"display: inline; margin-right: 6px;\"";
			$li_style = '';
			$output = "<p class=\"text-center\">" . _('第') . " {$this->cur_page} " . _('页') . " / " . _('共') . " {$this->page_count()} " . _('页') . "</p>";

			$output .= "<ul class=\"pagination pagination-sm\">";

			$js = $this->get_js_func(1);
			$output .= ($left === 1 ? "" : "<li $li_style><a href=\"./?$js\">&laquo;" . _('首页') . "</a></li><li class=\"disabled\"><span>...</span></li>");

			$js = $this->get_js_func($this->previous());
			$output .= $this->has_previous() ? "<li $li_style><a href=\"./?$js\">&laquo;</a></li>" : "";

			for ($i = $left; $i <= $right; $i++) { 
				
				$selected = ($i == $this->cur_page ? " class=\"active\"" : "");

				$js = $this->get_js_func($i);
				$output .= "<li $li_style {$selected}><a href=\"./?$js\">{$i}</a></li>";

			}

			$js = $this->get_js_func($this->next());
			$output .= $this->has_next() ? "<li $li_style><a href=\"./?$js\">&raquo;</a></li>" : "";

			$js = $this->get_js_func($this->page_count());
			$output .= ($right === $this->page_count() ? "" : "<li class=\"disabled\"><span>...</span></li><li $li_style><a href=\"./?$js\">" . _('尾页') . "&raquo;</a></li>");
			$output .= "</ul>";

			echo $output;

		}

	}

?>