<?php
//Include Common Files @1-C43A8E7E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "users_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Master Page implementation @1-703C09F6
include_once(RelativePath . "/Designs/theme-gc-intranet/MasterPage.php");
//End Master Page implementation

class clsRecordusersSearch { //usersSearch Class @4-C4FF86BD

//Variables @4-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @4-A35A5210
    function clsRecordusersSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record usersSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "usersSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_last_name = new clsControl(ccsTextBox, "s_last_name", $CCSLocales->GetText("last_name"), ccsText, "", CCGetRequestParam("s_last_name", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @4-A1E04F88
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_last_name->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_last_name->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-7EDCCF43
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_last_name->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-51996F74
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "users_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "users_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @4-D023157D
    function Show()
    {
        global $CCSUseAmp;
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_last_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_DoSearch->Show();
        $this->s_last_name->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End usersSearch Class @4-FCB6E20C

class clsGridusers { //users class @30-0CB76799

//Variables @30-057E5FFC

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_user_id;
    public $Sorter_first_name;
    public $Sorter_last_name;
    public $Sorter_phone_home;
    public $Sorter_user_is_active;
//End Variables

//Class_Initialize Event @30-4FDDF0A3
    function clsGridusers($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "users";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid users";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsusersDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 20;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("usersOrder", "");
        $this->SorterDirection = CCGetParam("usersDir", "");

        $this->user_id = new clsControl(ccsLink, "user_id", "user_id", ccsInteger, "", CCGetRequestParam("user_id", ccsGet, NULL), $this);
        $this->user_id->Page = "users_maint.php";
        $this->first_name = new clsControl(ccsLabel, "first_name", "first_name", ccsText, "", CCGetRequestParam("first_name", ccsGet, NULL), $this);
        $this->last_name = new clsControl(ccsLabel, "last_name", "last_name", ccsText, "", CCGetRequestParam("last_name", ccsGet, NULL), $this);
        $this->phone_home = new clsControl(ccsLabel, "phone_home", "phone_home", ccsText, "", CCGetRequestParam("phone_home", ccsGet, NULL), $this);
        $this->user_is_active = new clsControl(ccsLabel, "user_is_active", "user_is_active", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), CCGetRequestParam("user_is_active", ccsGet, NULL), $this);
        $this->users_Insert = new clsControl(ccsLink, "users_Insert", "users_Insert", ccsText, "", CCGetRequestParam("users_Insert", ccsGet, NULL), $this);
        $this->users_Insert->Parameters = CCGetQueryString("QueryString", array("user_id", "ccsForm"));
        $this->users_Insert->Page = "users_maint.php";
        $this->Sorter_user_id = new clsSorter($this->ComponentName, "Sorter_user_id", $FileName, $this);
        $this->Sorter_first_name = new clsSorter($this->ComponentName, "Sorter_first_name", $FileName, $this);
        $this->Sorter_last_name = new clsSorter($this->ComponentName, "Sorter_last_name", $FileName, $this);
        $this->Sorter_phone_home = new clsSorter($this->ComponentName, "Sorter_phone_home", $FileName, $this);
        $this->Sorter_user_is_active = new clsSorter($this->ComponentName, "Sorter_user_is_active", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @30-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @30-772A32F6
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_user_login"] = CCGetFromGet("s_user_login", NULL);
        $this->DataSource->Parameters["urls_first_name"] = CCGetFromGet("s_first_name", NULL);
        $this->DataSource->Parameters["urls_last_name"] = CCGetFromGet("s_last_name", NULL);
        $this->DataSource->Parameters["urls_title"] = CCGetFromGet("s_title", NULL);
        $this->DataSource->Parameters["urls_phone_home"] = CCGetFromGet("s_phone_home", NULL);
        $this->DataSource->Parameters["urls_phone_work"] = CCGetFromGet("s_phone_work", NULL);
        $this->DataSource->Parameters["urls_phone_day"] = CCGetFromGet("s_phone_day", NULL);
        $this->DataSource->Parameters["urls_phone_cell"] = CCGetFromGet("s_phone_cell", NULL);
        $this->DataSource->Parameters["urls_phone_evening"] = CCGetFromGet("s_phone_evening", NULL);
        $this->DataSource->Parameters["urls_fax"] = CCGetFromGet("s_fax", NULL);
        $this->DataSource->Parameters["urls_email"] = CCGetFromGet("s_email", NULL);
        $this->DataSource->Parameters["urls_notes"] = CCGetFromGet("s_notes", NULL);
        $this->DataSource->Parameters["urls_card_number"] = CCGetFromGet("s_card_number", NULL);
        $this->DataSource->Parameters["urls_card_expire_date"] = CCGetFromGet("s_card_expire_date", NULL);
        $this->DataSource->Parameters["urls_city"] = CCGetFromGet("s_city", NULL);
        $this->DataSource->Parameters["urls_zip"] = CCGetFromGet("s_zip", NULL);
        $this->DataSource->Parameters["urls_address1"] = CCGetFromGet("s_address1", NULL);
        $this->DataSource->Parameters["urls_address2"] = CCGetFromGet("s_address2", NULL);
        $this->DataSource->Parameters["urls_address3"] = CCGetFromGet("s_address3", NULL);
        $this->DataSource->Parameters["urls_ip_add"] = CCGetFromGet("s_ip_add", NULL);
        $this->DataSource->Parameters["urls_ip_update"] = CCGetFromGet("s_ip_update", NULL);
        $this->DataSource->Parameters["urls_image_url"] = CCGetFromGet("s_image_url", NULL);
        $this->DataSource->Parameters["urls_user_SSN"] = CCGetFromGet("s_user_SSN", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["user_id"] = $this->user_id->Visible;
            $this->ControlsVisible["first_name"] = $this->first_name->Visible;
            $this->ControlsVisible["last_name"] = $this->last_name->Visible;
            $this->ControlsVisible["phone_home"] = $this->phone_home->Visible;
            $this->ControlsVisible["user_is_active"] = $this->user_is_active->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->user_id->SetValue($this->DataSource->user_id->GetValue());
                $this->user_id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->user_id->Parameters = CCAddParam($this->user_id->Parameters, "user_id", $this->DataSource->f("user_id"));
                $this->first_name->SetValue($this->DataSource->first_name->GetValue());
                $this->last_name->SetValue($this->DataSource->last_name->GetValue());
                $this->phone_home->SetValue($this->DataSource->phone_home->GetValue());
                $this->user_is_active->SetValue($this->DataSource->user_is_active->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->user_id->Show();
                $this->first_name->Show();
                $this->last_name->Show();
                $this->phone_home->Show();
                $this->user_is_active->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->users_Insert->Show();
        $this->Sorter_user_id->Show();
        $this->Sorter_first_name->Show();
        $this->Sorter_last_name->Show();
        $this->Sorter_phone_home->Show();
        $this->Sorter_user_is_active->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @30-562E84EB
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->user_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->first_name->Errors->ToString());
        $errors = ComposeStrings($errors, $this->last_name->Errors->ToString());
        $errors = ComposeStrings($errors, $this->phone_home->Errors->ToString());
        $errors = ComposeStrings($errors, $this->user_is_active->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End users Class @30-FCB6E20C

class clsusersDataSource extends clsDBmyproject {  //usersDataSource Class @30-450B5E7B

//DataSource Variables @30-131EFBC7
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $user_id;
    public $first_name;
    public $last_name;
    public $phone_home;
    public $user_is_active;
//End DataSource Variables

//DataSourceClass_Initialize Event @30-1EF3176E
    function clsusersDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid users";
        $this->Initialize();
        $this->user_id = new clsField("user_id", ccsInteger, "");
        
        $this->first_name = new clsField("first_name", ccsText, "");
        
        $this->last_name = new clsField("last_name", ccsText, "");
        
        $this->phone_home = new clsField("phone_home", ccsText, "");
        
        $this->user_is_active = new clsField("user_is_active", ccsBoolean, $this->BooleanFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @30-E0BB0FF5
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_user_id" => array("user_id", ""), 
            "Sorter_first_name" => array("first_name", ""), 
            "Sorter_last_name" => array("last_name", ""), 
            "Sorter_phone_home" => array("phone_home", ""), 
            "Sorter_user_is_active" => array("user_is_active", "")));
    }
//End SetOrder Method

//Prepare Method @30-A2EB7CF3
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_user_login", ccsText, "", "", $this->Parameters["urls_user_login"], "", false);
        $this->wp->AddParameter("2", "urls_first_name", ccsText, "", "", $this->Parameters["urls_first_name"], "", false);
        $this->wp->AddParameter("3", "urls_last_name", ccsText, "", "", $this->Parameters["urls_last_name"], "", false);
        $this->wp->AddParameter("4", "urls_title", ccsText, "", "", $this->Parameters["urls_title"], "", false);
        $this->wp->AddParameter("5", "urls_phone_home", ccsText, "", "", $this->Parameters["urls_phone_home"], "", false);
        $this->wp->AddParameter("6", "urls_phone_work", ccsText, "", "", $this->Parameters["urls_phone_work"], "", false);
        $this->wp->AddParameter("7", "urls_phone_day", ccsText, "", "", $this->Parameters["urls_phone_day"], "", false);
        $this->wp->AddParameter("8", "urls_phone_cell", ccsText, "", "", $this->Parameters["urls_phone_cell"], "", false);
        $this->wp->AddParameter("9", "urls_phone_evening", ccsText, "", "", $this->Parameters["urls_phone_evening"], "", false);
        $this->wp->AddParameter("10", "urls_fax", ccsText, "", "", $this->Parameters["urls_fax"], "", false);
        $this->wp->AddParameter("11", "urls_email", ccsText, "", "", $this->Parameters["urls_email"], "", false);
        $this->wp->AddParameter("12", "urls_notes", ccsMemo, "", "", $this->Parameters["urls_notes"], "", false);
        $this->wp->AddParameter("13", "urls_card_number", ccsText, "", "", $this->Parameters["urls_card_number"], "", false);
        $this->wp->AddParameter("14", "urls_card_expire_date", ccsText, "", "", $this->Parameters["urls_card_expire_date"], "", false);
        $this->wp->AddParameter("15", "urls_city", ccsText, "", "", $this->Parameters["urls_city"], "", false);
        $this->wp->AddParameter("16", "urls_zip", ccsText, "", "", $this->Parameters["urls_zip"], "", false);
        $this->wp->AddParameter("17", "urls_address1", ccsText, "", "", $this->Parameters["urls_address1"], "", false);
        $this->wp->AddParameter("18", "urls_address2", ccsText, "", "", $this->Parameters["urls_address2"], "", false);
        $this->wp->AddParameter("19", "urls_address3", ccsText, "", "", $this->Parameters["urls_address3"], "", false);
        $this->wp->AddParameter("20", "urls_ip_add", ccsText, "", "", $this->Parameters["urls_ip_add"], "", false);
        $this->wp->AddParameter("21", "urls_ip_update", ccsText, "", "", $this->Parameters["urls_ip_update"], "", false);
        $this->wp->AddParameter("22", "urls_image_url", ccsText, "", "", $this->Parameters["urls_image_url"], "", false);
        $this->wp->AddParameter("23", "urls_user_SSN", ccsText, "", "", $this->Parameters["urls_user_SSN"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "user_login", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "first_name", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "last_name", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "title", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "phone_home", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "phone_work", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "phone_day", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsText),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opContains, "phone_cell", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsText),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opContains, "phone_evening", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsText),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opContains, "fax", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsText),false);
        $this->wp->Criterion[11] = $this->wp->Operation(opContains, "email", $this->wp->GetDBValue("11"), $this->ToSQL($this->wp->GetDBValue("11"), ccsText),false);
        $this->wp->Criterion[12] = $this->wp->Operation(opContains, "notes", $this->wp->GetDBValue("12"), $this->ToSQL($this->wp->GetDBValue("12"), ccsMemo),false);
        $this->wp->Criterion[13] = $this->wp->Operation(opContains, "card_number", $this->wp->GetDBValue("13"), $this->ToSQL($this->wp->GetDBValue("13"), ccsText),false);
        $this->wp->Criterion[14] = $this->wp->Operation(opContains, "card_expire_date", $this->wp->GetDBValue("14"), $this->ToSQL($this->wp->GetDBValue("14"), ccsText),false);
        $this->wp->Criterion[15] = $this->wp->Operation(opContains, "city", $this->wp->GetDBValue("15"), $this->ToSQL($this->wp->GetDBValue("15"), ccsText),false);
        $this->wp->Criterion[16] = $this->wp->Operation(opContains, "zip", $this->wp->GetDBValue("16"), $this->ToSQL($this->wp->GetDBValue("16"), ccsText),false);
        $this->wp->Criterion[17] = $this->wp->Operation(opContains, "address1", $this->wp->GetDBValue("17"), $this->ToSQL($this->wp->GetDBValue("17"), ccsText),false);
        $this->wp->Criterion[18] = $this->wp->Operation(opContains, "address2", $this->wp->GetDBValue("18"), $this->ToSQL($this->wp->GetDBValue("18"), ccsText),false);
        $this->wp->Criterion[19] = $this->wp->Operation(opContains, "address3", $this->wp->GetDBValue("19"), $this->ToSQL($this->wp->GetDBValue("19"), ccsText),false);
        $this->wp->Criterion[20] = $this->wp->Operation(opContains, "ip_add", $this->wp->GetDBValue("20"), $this->ToSQL($this->wp->GetDBValue("20"), ccsText),false);
        $this->wp->Criterion[21] = $this->wp->Operation(opContains, "ip_update", $this->wp->GetDBValue("21"), $this->ToSQL($this->wp->GetDBValue("21"), ccsText),false);
        $this->wp->Criterion[22] = $this->wp->Operation(opContains, "image_url", $this->wp->GetDBValue("22"), $this->ToSQL($this->wp->GetDBValue("22"), ccsText),false);
        $this->wp->Criterion[23] = $this->wp->Operation(opContains, "user_SSN", $this->wp->GetDBValue("23"), $this->ToSQL($this->wp->GetDBValue("23"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]), 
             $this->wp->Criterion[10]), 
             $this->wp->Criterion[11]), 
             $this->wp->Criterion[12]), 
             $this->wp->Criterion[13]), 
             $this->wp->Criterion[14]), 
             $this->wp->Criterion[15]), 
             $this->wp->Criterion[16]), 
             $this->wp->Criterion[17]), 
             $this->wp->Criterion[18]), 
             $this->wp->Criterion[19]), 
             $this->wp->Criterion[20]), 
             $this->wp->Criterion[21]), 
             $this->wp->Criterion[22]), 
             $this->wp->Criterion[23]);
    }
//End Prepare Method

//Open Method @30-2BD99CFC
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM users";
        $this->SQL = "SELECT user_id, user_login, first_name, last_name, title, group_id, phone_home, phone_work, phone_day, phone_cell, phone_evening,\n\n" .
        "fax, email, card_number, card_expire_date, country_id, state_id, city, zip, address1, address2, address3, date_add, date_last_login,\n\n" .
        "ip_add, ip_update, language_id, image_url, age_id, gender_id, education_id, income_id, user_SSN, user_is_active \n\n" .
        "FROM users {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @30-2296B48E
    function SetValues()
    {
        $this->user_id->SetDBValue(trim($this->f("user_id")));
        $this->first_name->SetDBValue($this->f("first_name"));
        $this->last_name->SetDBValue($this->f("last_name"));
        $this->phone_home->SetDBValue($this->f("phone_home"));
        $this->user_is_active->SetDBValue(trim($this->f("user_is_active")));
    }
//End SetValues Method

} //End usersDataSource Class @30-FCB6E20C

//Include Page implementation @167-07AA2166
include_once(RelativePath . "/MenuIncludablePage.php");
//End Include Page implementation

//Initialize Page @1-1C4CF129
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";
$PathToCurrentMasterPage = "";
$TemplatePathValue = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$MasterPage = null;
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "users_list.html";
$BlockToParse = "main";
$TemplateEncoding = "UTF-8";
$ContentType = "text/html";
$PathToRoot = "./";
$PathToRootOpt = "";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/updatepanel/ccs-update-panel.js|";
$Charset = $Charset ? $Charset : "utf-8";
//End Initialize Page

//Include events file @1-13285D66
include_once("./users_list_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5DE5E8D5
$DBmyproject = new clsDBmyproject();
$MainPage->Connections["myproject"] = & $DBmyproject;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$MasterPage = new clsMasterPage("/Designs/" . $CCProjectDesign . "/", "MasterPage", $MainPage);
$MasterPage->Attributes = $Attributes;
$MasterPage->Initialize();
$Head = new clsPanel("Head", $MainPage);
$Head->PlaceholderName = "Head";
$Content = new clsPanel("Content", $MainPage);
$Content->PlaceholderName = "Content";
$Panel1 = new clsPanel("Panel1", $MainPage);
$Panel1->GenerateDiv = true;
$Panel1->PanelId = "ContentPanel1";
$usersSearch = new clsRecordusersSearch("", $MainPage);
$users = new clsGridusers("", $MainPage);
$Menu = new clsPanel("Menu", $MainPage);
$Menu->PlaceholderName = "Menu";
$MenuIncludablePage = new clsMenuIncludablePage("", "MenuIncludablePage", $MainPage);
$MenuIncludablePage->Initialize();
$Sidebar1 = new clsPanel("Sidebar1", $MainPage);
$Sidebar1->PlaceholderName = "Sidebar1";
$HeaderSidebar = new clsPanel("HeaderSidebar", $MainPage);
$HeaderSidebar->PlaceholderName = "HeaderSidebar";
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->Panel1 = & $Panel1;
$MainPage->usersSearch = & $usersSearch;
$MainPage->users = & $users;
$MainPage->Menu = & $Menu;
$MainPage->MenuIncludablePage = & $MenuIncludablePage;
$MainPage->Sidebar1 = & $Sidebar1;
$MainPage->HeaderSidebar = & $HeaderSidebar;
$Content->AddComponent("Panel1", $Panel1);
$Panel1->AddComponent("usersSearch", $usersSearch);
$Panel1->AddComponent("users", $users);
$Menu->AddComponent("MenuIncludablePage", $MenuIncludablePage);
$users->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-577E43E0
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "UTF-8", "replace");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "UTF-8", "replace");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->SetVar("CCS_PathToMasterPage", RelativePath . $PathToCurrentMasterPage);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-529D8848
$MasterPage->Operations();
$MenuIncludablePage->Operations();
$usersSearch->Operation();
//End Execute Components

//Go to destination page @1-5F50949F
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBmyproject->close();
    header("Location: " . $Redirect);
    unset($usersSearch);
    unset($users);
    $MenuIncludablePage->Class_Terminate();
    unset($MenuIncludablePage);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E24D7EEF
$Head->Show();
$Content->Show();
$Menu->Show();
$Sidebar1->Show();
$HeaderSidebar->Show();
$MasterPage->Tpl->SetVar("Head", $Tpl->GetVar("Panel Head"));
$MasterPage->Tpl->SetVar("Content", $Tpl->GetVar("Panel Content"));
$MasterPage->Tpl->SetVar("Menu", $Tpl->GetVar("Panel Menu"));
$MasterPage->Tpl->SetVar("Sidebar1", $Tpl->GetVar("Panel Sidebar1"));
$MasterPage->Tpl->SetVar("HeaderSidebar", $Tpl->GetVar("Panel HeaderSidebar"));
$MasterPage->Show();
if (!isset($main_block)) $main_block = $MasterPage->HTML;
$main_block = CCConvertEncoding($main_block, $FileEncoding, $CCSLocales->GetFormatInfo("Encoding"));
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-19AB954E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBmyproject->close();
unset($MasterPage);
unset($usersSearch);
unset($users);
$MenuIncludablePage->Class_Terminate();
unset($MenuIncludablePage);
unset($Tpl);
//End Unload Page


?>
