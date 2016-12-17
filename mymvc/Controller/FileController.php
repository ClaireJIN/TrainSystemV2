<?php 
	class FileController extends Controller {
		function __construct() {
			parent::__construct();
		}

		public function upload() {
			// $excel = new PHPExcel;
			$up = new fileupload;
	        //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
	        $up -> set("path", UploadPath);
	        //$up -> set("maxsize", 2000000);
	        $up -> set("allowtype", array("xls"));
	        $up -> set("israndname", false);
	  

	        foreach ($_FILES as $key => $value) {
	        	if($up -> upload($key)) {
		            $this->readExcel(UploadPath . $up->getFileName());
		        } else {
		            echo '<pre>';
		            //获取上传失败以后的错误提示
		            var_dump($up->getErrorMsg());
		            echo '</pre>';
		        }
	        }
	        
	    }
		public function readExcel() {
			$file = UploadPath . "test.xls";
			$phpExcel = new PHPExcel;
			$phpReader = new PHPExcel_Reader_Excel5;
			if (!$phpReader->canRead($file)) {
				die("文件读取失败！");
			}

			$phpReader->setReadDataOnly(true);
			$phpExcel = $phpReader->load($file);
			$currentSheet = $phpExcel->getSheet(0);
			$maxColumn = $currentSheet->getHighestColumn();
			$maxRow = $currentSheet->getHighestRow();

			$data = [];
			$temp = [];
			for ($i=1; $i <= $maxRow; $i++) { 
				$temp['A'] = $phpExcel->getActiveSheet()->getCellByColumnAndRow(0,$i)->getValue();
				$temp['B'] = $phpExcel->getActiveSheet()->getCell('B'.$i)->getValue();
				$temp['C'] = $phpExcel->getActiveSheet()->getCellByColumnAndRow(2,$i)->getValue();
				$temp['D'] = $phpExcel->getActiveSheet()->getCellByColumnAndRow(3,$i)->getValue();
				$data[] = $temp;
			}

			echo "<table>";
			foreach ($data as $value) {
				echo "<tr>";
				echo "<td>".$value['A']."</td>";
				echo "<td>".$value['B']."</td>";
				echo "<td>".$value['C']."</td>";
				echo "<td>".$value['D']."</td>";

				echo "</tr>";
			}
			echo "</table>";
			
		}

		public function makeExcel() {
			$phpExcel = new PHPExcel;
			$phpExcel->getProperties()->setCreator("Jin")
										->setTitle("TrainList");
			$phpExcel->setActiveSheetIndex(0)
						->setCellValue('A1', '美国')
						->setCellValue('A2', '中国');
			$phpExcel->getActiveSheet()->setTitle('test');
			$writer = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');
			$writer->save(UploadPath . 'test6.xlsx');
		}

	}


 ?>