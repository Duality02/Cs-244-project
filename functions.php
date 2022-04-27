<?php

class user 
{
    public $id;
    public $mail;
    public $pass;
    public $name;
    public $birthday;
    public $fileManaegrobj;

    function __construct()
    {
        $this->fileManagerobj=new fileManager();
        $this->fileManagerobj->fileName="UsersFile.txt";
        $this->fileManagerobj->separator="~";
    }

    function storeuser($record)
    {
        $id=$this->fileManagerobj-> getLastId($this->fileManagerobj->Separator)+1;
        $record=$id."~".$this->mail."~".$this->pass."~".$this->name."~".$this->birthday;
        $this->fileManagerobj->storerec($record);
        
    }

    function listallusers()
    {
        $myreturn=array();
        $myfile= fopen($this->fileManagerobj->fileName,"r+") or die ("unable to open");
        $i=0;
        while(!feof($myfile))
        {
            $line=fgets($myfile);
            $arrayline=explode($this->fileManagerobj->separator,$line);
            $myreturn[$i]=$this->getuserbyid($arrayline[0]);
            $i++;

        }

        fclose($myfile);
        return $myreturn;
    }

    function deleteuser($id)
    {
        $record=$this->fileManagerobj->getlinewithid($id);
        $this->fileManagerobj->deleteRecord($record);
    }

    function getuserbyid($id)
    {
        $r=new user();
        $record=$this->fileManagerobj->getlinebyid($id);
        $arrayline=explode("~",$record);

        $r->id=$arrayline[0];
        $r->mail=$arrayline[1];
        $r->pass=$arrayline[2];
        $r->name=$arrayline[3];
        $r->birthday=$arrayline[4];
        return $r;
    }
}
class type
{
    public $id;
    public $typename;
    public $fileManaegrobj;

    function __construct()
    {
        $this->fileManagerobj=new fileManager();
        $this->fileManagerobj->fileName="UserTypes.txt";
        $this->fileManagerobj->separator="~";
    }

    function storetype($record)
    {
        $id=$this->fileManagerobj-> getLastId($this->fileManagerobj->Separator)+1;
        $record=$id."~".$this->typename;
        $this->fileManagerobj->storerec($record);
        
    }

    function listalltypes()
    {
        $myreturn=array();
        $myfile= fopen($this->fileManagerobj->fileName,"r+") or die ("unable to open");
        $i=0;
        while(!feof($myfile))
        {
            $line=fgets($myfile);
            $arrayline=explode($this->fileManagerobj->separator,$line);
            $myreturn[$i]=$this->getTypebyid($arrayline[0]);
            $i++;

        }

        fclose($myfile);
        return $myreturn;
    }

    function deletetype($id)
    {
        $record=$this->fileManagerobj->getlinewithid($id);
        $this->fileManagerobj->deleteRecord($record);
    }

    function getTypebyid($id)
    {
        $r=new type();
        $record=$this->fileManagerobj->getlinebyid($id);
        $arrayline=explode($this->fileManagerobj->separator,$record);

        $r->id=$arrayline[0];
        $r->typename=$arrayline[1];
        return $r;
    }
}




class fileManager
{
    public $fileName;
    public $Separator;


    function deleteRecord($record)
    {
        $content=fileGetContent($this->fileName);
        $content=str_replace($record,'',$content);
        filePutContent($this->fileName,$content);
    }


    function storerec()
    {
        $myfile = fopen("UserTypes.txt", "a+");
        fwrite($myfile, $record."\r\n");
        fclose($myfile);
    }


    function getlinebyid($id)
    {
        if ( !file_exists($this->fileName) ) {
            return 0;
           }		
         
         $myfile = fopen($this->fileName, "r+") or die("Unable to open file!");
         $LastId=0;
         while(!feof($myfile)) 
         {
               $line= fgets($myfile);
               $ArrayLine=explode("~",$line);
               
               if ($ArrayLine[0]==$id)
               {
                 return $line;	
             }
               
         }
         return False;
    }

    function UpdateRecord($fileName,$Newrecord,$OldRecord)
{

	$contents = file_get_contents($fileName);
	$contents = str_replace($OldRecord,$Newrecord, $contents);
	file_put_contents($fileName, $contents);
}


    function getLastId()
{
	
	if ( !file_exists($this->fileName) ) {
       return 0;
      }		
	
	$myfile = fopen($this->fileName, "r+") or die("Unable to open file!");
	$LastId=0;
	while(!feof($myfile)) 
	{
  		$line= fgets($myfile);
  		$ArrayLine=explode("$this->Separator",$line);
  		
  		if ($ArrayLine[0]!="")
  		{
		$LastId=$ArrayLine[0];	
		}
  		
	}
	return $LastId;
}


function drawtable()
{
    $mylist = fopen ($this->fileName,"r+") or die("NOT FOUND");
    while(!feof($mylist))
    {
        $line = fgets($mylist);
        echo "<tr>";
        $arrayline = explode($this->Separator,$line);
        for($i=0;i<count($arrayline);$i++)
        {
            echo "<td>".$arrayline[i]."</td>";
        }
        echo "/tr";

    }
    fclose("UsersFile.txt");
}
}




?>