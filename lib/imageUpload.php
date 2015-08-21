<?php

class imageUpload{
	private $field;
	private $foldername;
	private $width;
	private $height;
	private $mime;
	private $size;
	private $fileasli;
	private $filename;
	
	public function __construct($fieldname, $foldername)
	{
		$this->field = $fieldname;
		$this->foldername = $foldername;
		$this->mime = "";
		$this->size = 0;
		$this->width = 0;
		$this->height = 0;
		$this->fileasli = "";
		$this->filename = "";
	}
	
	public function getWidth()
	{
		return $this->width;
	}
	
	public function getHeight()
	{
		return $this->height;
	}
	
	public function getMime()
	{
		return $this->mime;
	}
	
	public function getSize()
	{
		return $this->size;
	}
	
	public function getFilename()
	{
		return $this->filename;
	}
	
	public function getFileAsli()
	{
		return $this->fileasli;
	}
	
	public function getPath()
	{
		$foldercopied = "/var/www/cmsmediafile/".$this->foldername;
		return $foldercopied;
	}
	
	public function proses()
	{
		if(isset($_FILES[$this->field]))
		{
			if(strlen(trim($_FILES[$this->field]['name'])) > 0)
			{
				$path_parts = pathinfo($_FILES[$this->field]['name']);
				$ext = $path_parts['extension'];
				$fname = util::randomKey(); // util::passwordHash(time().$_FILES[$this->field]['name']);
				$filename = $fname.".".$ext;
				$this->filename = $filename;
				$this->fileasli = $_FILES[$this->field]['name'];
					
				$foldercopied = $this->getPath(); //DOCROOT."db/mediafile/".$this->foldername;
				if(!file_exists($foldercopied))
				{
					$oldumask = umask(0);
					mkdir($foldercopied, 0777, true); 
					umask($oldumask); 
				}
				$copyto = $foldercopied."/".$filename;
				rename($_FILES[$this->field]['tmp_name'], $copyto);
				$this->mime = $_FILES[$this->field]['type'];
				$this->size = intval($_FILES[$this->field]['size']);
				if(($this->mime == "image/png") || ($this->mime == "image/jpg") || ($this->mime == "image/jpeg")) 
				{
					$imagedata = getimagesize($copyto);
					$this->width = $imagedata[0];
					$this->height = $imagedata[1];
					
					return true;
				}
				else {
					echo 'mime error : '.$this->mime;
					die;
				}
			}
		}
		return false;
	}
}
