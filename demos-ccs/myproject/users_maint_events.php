<?php
//BindEvents Method @1-C10152B1
function BindEvents()
{
    global $users;
    $users->user_password->CCSEvents["OnValidate"] = "users_user_password_OnValidate";
    $users->date_add->CCSEvents["BeforeShow"] = "users_date_add_BeforeShow";
    $users->date_last_login->CCSEvents["BeforeShow"] = "users_date_last_login_BeforeShow";
    $users->CCSEvents["BeforeShow"] = "users_BeforeShow";
    $users->ds->CCSEvents["BeforeExecuteInsert"] = "users_ds_BeforeExecuteInsert";
    $users->ds->CCSEvents["BeforeExecuteUpdate"] = "users_ds_BeforeExecuteUpdate";
}
//End BindEvents Method

//users_user_password_OnValidate @11-8B8FA315
function users_user_password_OnValidate(& $sender)
{
    $users_user_password_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_user_password_OnValidate

//Reset Password Validation @12-9E1B25AF
    if ($Container->EditMode && ($Container->user_password->GetValue() == "")) {
        $Component->Errors->Clear();
    }
//End Reset Password Validation

//Close users_user_password_OnValidate @11-3B5F0F45
    return $users_user_password_OnValidate;
}
//End Close users_user_password_OnValidate

//users_date_add_BeforeShow @34-E947DC8E
function users_date_add_BeforeShow(& $sender)
{
    $users_date_add_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_date_add_BeforeShow

//Close users_date_add_BeforeShow @34-E5BAC00C
    return $users_date_add_BeforeShow;
}
//End Close users_date_add_BeforeShow

//users_date_last_login_BeforeShow @36-B433DAF6
function users_date_last_login_BeforeShow(& $sender)
{
    $users_date_last_login_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_date_last_login_BeforeShow

//Close users_date_last_login_BeforeShow @36-5FCB6439
    return $users_date_last_login_BeforeShow;
}
//End Close users_date_last_login_BeforeShow

//users_BeforeShow @2-576AC3E5
function users_BeforeShow(& $sender)
{
    $users_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_BeforeShow

//Preserve Password @3-63BDFC35
    if (!$Component->FormSubmitted) {
        $Component->user_password_Shadow->SetValue(CCEncryptString($Component->user_password->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE));
        $Component->user_password->SetValue("");
    }
//End Preserve Password

//Close users_BeforeShow @2-500F6ED2
    return $users_BeforeShow;
}
//End Close users_BeforeShow

//users_ds_BeforeExecuteInsert @2-F909E977
function users_ds_BeforeExecuteInsert(& $sender)
{
    $users_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_ds_BeforeExecuteInsert

//Encrypt Password @5-0B4334F5
    $Component->DataSource->SQL = str_replace("'{password}'", "MD5(CONCAT('2RTT2ylqA9ja40Rf'," . $Component->DataSource->ToSQL($Component->user_password->GetValue(), ccsText) . "))", $Component->DataSource->SQL);
//End Encrypt Password

//Close users_ds_BeforeExecuteInsert @2-7B037CAA
    return $users_ds_BeforeExecuteInsert;
}
//End Close users_ds_BeforeExecuteInsert

//users_ds_BeforeExecuteUpdate @2-1FCB7CF5
function users_ds_BeforeExecuteUpdate(& $sender)
{
    $users_ds_BeforeExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_ds_BeforeExecuteUpdate

//Encrypt Password @7-8C7740A0
    if ("" != $Component->user_password->GetValue()) {
        $Component->DataSource->SQL = str_replace("'{password}'", "MD5(CONCAT('2RTT2ylqA9ja40Rf'," . $Component->DataSource->ToSQL($Component->user_password->GetValue(), ccsText) . "))", $Component->DataSource->SQL);
    } else {
        $Component->DataSource->SQL = str_replace("'{password}'", $Component->DataSource->ToSQL(CCDecryptString($Component->user_password_Shadow->GetValue(), CCS_ENCRYPTION_KEY_FOR_COOKIE), ccsText), $Component->DataSource->SQL);
    }
//End Encrypt Password

//Close users_ds_BeforeExecuteUpdate @2-B42ABD25
    return $users_ds_BeforeExecuteUpdate;
}
//End Close users_ds_BeforeExecuteUpdate


?>
