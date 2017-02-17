<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" masterPage="{CCS_PathToMasterPage}/MasterPage.ccp" useDesign="True" wizardTheme="None" needGeneration="0">
	<Components>
		<Panel id="162" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="163" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Panel id="2" visible="True" generateDiv="True" name="Panel1" PathID="ContentPanel1" features="(assigned)">
					<Components>
						<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="usersSearch" returnPage="users_list.ccp" wizardCaption="{res:Search_Form}" wizardOrientation="Vertical" wizardFormMethod="post" wizardTypeComponent="Search" PathID="ContentPanel1usersSearch" parentId="30">
							<Components>
								<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" parentName="usersSearch" PathID="ContentPanel1usersSearchButton_DoSearch">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_user_login" wizardCaption="{res:user_login}" fieldSource="user_login" wizardIsPassword="False" parentName="usersSearch" caption="{res:user_login}" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="ContentPanel1usersSearchs_user_login">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_first_name" wizardCaption="{res:first_name}" fieldSource="first_name" wizardIsPassword="False" parentName="usersSearch" caption="{res:first_name}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_first_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_last_name" wizardCaption="{res:last_name}" fieldSource="last_name" wizardIsPassword="False" parentName="usersSearch" caption="{res:last_name}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_last_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_title" wizardCaption="{res:title}" fieldSource="title" wizardIsPassword="False" parentName="usersSearch" caption="{res:title}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_title">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_phone_home" wizardCaption="{res:phone_home}" fieldSource="phone_home" wizardIsPassword="False" parentName="usersSearch" caption="{res:phone_home}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_phone_home">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_phone_work" wizardCaption="{res:phone_work}" fieldSource="phone_work" wizardIsPassword="False" parentName="usersSearch" caption="{res:phone_work}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_phone_work">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_phone_day" wizardCaption="{res:phone_day}" fieldSource="phone_day" wizardIsPassword="False" parentName="usersSearch" caption="{res:phone_day}" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="ContentPanel1usersSearchs_phone_day">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="13" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_phone_cell" wizardCaption="{res:phone_cell}" fieldSource="phone_cell" wizardIsPassword="False" parentName="usersSearch" caption="{res:phone_cell}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_phone_cell">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_phone_evening" wizardCaption="{res:phone_evening}" fieldSource="phone_evening" wizardIsPassword="False" parentName="usersSearch" caption="{res:phone_evening}" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="ContentPanel1usersSearchs_phone_evening">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_fax" wizardCaption="{res:fax}" fieldSource="fax" wizardIsPassword="False" parentName="usersSearch" caption="{res:fax}" required="False" unique="False" wizardSize="20" wizardMaxLength="20" PathID="ContentPanel1usersSearchs_fax">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_email" wizardCaption="{res:email}" fieldSource="email" wizardIsPassword="False" parentName="usersSearch" caption="{res:email}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_email">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Memo" name="s_notes" wizardCaption="{res:notes}" fieldSource="notes" wizardIsPassword="False" parentName="usersSearch" caption="{res:notes}" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentPanel1usersSearchs_notes">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_card_number" wizardCaption="{res:card_number}" fieldSource="card_number" wizardIsPassword="False" parentName="usersSearch" caption="{res:card_number}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_card_number">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="19" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_card_expire_date" wizardCaption="{res:card_expire_date}" fieldSource="card_expire_date" wizardIsPassword="False" parentName="usersSearch" caption="{res:card_expire_date}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="ContentPanel1usersSearchs_card_expire_date">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_city" wizardCaption="{res:city}" fieldSource="city" wizardIsPassword="False" parentName="usersSearch" caption="{res:city}" required="False" unique="False" wizardSize="30" wizardMaxLength="30" PathID="ContentPanel1usersSearchs_city">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_zip" wizardCaption="{res:zip}" fieldSource="zip" wizardIsPassword="False" parentName="usersSearch" caption="{res:zip}" required="False" unique="False" wizardSize="10" wizardMaxLength="10" PathID="ContentPanel1usersSearchs_zip">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_address1" wizardCaption="{res:address1}" fieldSource="address1" wizardIsPassword="False" parentName="usersSearch" caption="{res:address1}" required="False" unique="False" wizardSize="50" wizardMaxLength="250" PathID="ContentPanel1usersSearchs_address1">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_address2" wizardCaption="{res:address2}" fieldSource="address2" wizardIsPassword="False" parentName="usersSearch" caption="{res:address2}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_address2">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_address3" wizardCaption="{res:address3}" fieldSource="address3" wizardIsPassword="False" parentName="usersSearch" caption="{res:address3}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_address3">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_ip_add" wizardCaption="{res:ip_add}" fieldSource="ip_add" wizardIsPassword="False" parentName="usersSearch" caption="{res:ip_add}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_ip_add">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_ip_update" wizardCaption="{res:ip_update}" fieldSource="ip_update" wizardIsPassword="False" parentName="usersSearch" caption="{res:ip_update}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_ip_update">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_image_url" wizardCaption="{res:image_url}" fieldSource="image_url" wizardIsPassword="False" parentName="usersSearch" caption="{res:image_url}" required="False" unique="False" wizardSize="50" wizardMaxLength="64" PathID="ContentPanel1usersSearchs_image_url">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
								<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_user_SSN" wizardCaption="{res:user_SSN}" fieldSource="user_SSN" wizardIsPassword="False" parentName="usersSearch" caption="{res:user_SSN}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1usersSearchs_user_SSN">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</TextBox>
							</Components>
							<Events/>
							<TableParameters/>
							<SPParameters/>
							<SQLParameters/>
							<JoinTables/>
							<JoinLinks/>
							<Fields/>
							<PKFields/>
							<ISPParameters/>
							<ISQLParameters/>
							<IFormElements/>
							<USPParameters/>
							<USQLParameters/>
							<UConditions/>
							<UFormElements/>
							<DSPParameters/>
							<DSQLParameters/>
							<DConditions/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Record>
						<Grid id="30" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="users" connection="myproject" pageSizeLimit="100" wizardCaption="{res:users_GridForm}" wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" wizardUseSearch="True" childId="4" dataSource="users">
							<Components>
								<Link id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="users_Insert" hrefSource="users_maint.ccp" removeParameters="user_id" wizardThemeItem="NavigatorLink" wizardDefaultValue="{res:CCS_InsertLink}" parentName="users" PathID="ContentPanel1usersusers_Insert">
									<Components/>
									<Events/>
									<LinkParameters/>
									<Attributes/>
									<Features/>
								</Link>
								<Sorter id="56" visible="True" name="Sorter_user_id" column="user_id" wizardCaption="{res:user_id}" wizardSortingType="SimpleDir" wizardControl="user_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_user_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="57" visible="True" name="Sorter_user_login" column="user_login" wizardCaption="{res:user_login}" wizardSortingType="SimpleDir" wizardControl="user_login" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_user_login">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="58" visible="True" name="Sorter_first_name" column="first_name" wizardCaption="{res:first_name}" wizardSortingType="SimpleDir" wizardControl="first_name" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_first_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="59" visible="True" name="Sorter_last_name" column="last_name" wizardCaption="{res:last_name}" wizardSortingType="SimpleDir" wizardControl="last_name" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_last_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="60" visible="True" name="Sorter_title" column="title" wizardCaption="{res:title}" wizardSortingType="SimpleDir" wizardControl="title" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_title">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="61" visible="True" name="Sorter_group_id" column="group_id" wizardCaption="{res:group_id}" wizardSortingType="SimpleDir" wizardControl="group_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_group_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="62" visible="True" name="Sorter_phone_home" column="phone_home" wizardCaption="{res:phone_home}" wizardSortingType="SimpleDir" wizardControl="phone_home" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_phone_home">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="63" visible="True" name="Sorter_phone_work" column="phone_work" wizardCaption="{res:phone_work}" wizardSortingType="SimpleDir" wizardControl="phone_work" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_phone_work">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="64" visible="True" name="Sorter_phone_day" column="phone_day" wizardCaption="{res:phone_day}" wizardSortingType="SimpleDir" wizardControl="phone_day" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_phone_day">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="65" visible="True" name="Sorter_phone_cell" column="phone_cell" wizardCaption="{res:phone_cell}" wizardSortingType="SimpleDir" wizardControl="phone_cell" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_phone_cell">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="66" visible="True" name="Sorter_phone_evening" column="phone_evening" wizardCaption="{res:phone_evening}" wizardSortingType="SimpleDir" wizardControl="phone_evening" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_phone_evening">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="67" visible="True" name="Sorter_fax" column="fax" wizardCaption="{res:fax}" wizardSortingType="SimpleDir" wizardControl="fax" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_fax">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="68" visible="True" name="Sorter_email" column="email" wizardCaption="{res:email}" wizardSortingType="SimpleDir" wizardControl="email" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_email">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="69" visible="True" name="Sorter_card_number" column="card_number" wizardCaption="{res:card_number}" wizardSortingType="SimpleDir" wizardControl="card_number" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_card_number">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="70" visible="True" name="Sorter_card_expire_date" column="card_expire_date" wizardCaption="{res:card_expire_date}" wizardSortingType="SimpleDir" wizardControl="card_expire_date" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_card_expire_date">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="71" visible="True" name="Sorter_country_id" column="country_id" wizardCaption="{res:country_id}" wizardSortingType="SimpleDir" wizardControl="country_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_country_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="72" visible="True" name="Sorter_state_id" column="state_id" wizardCaption="{res:state_id}" wizardSortingType="SimpleDir" wizardControl="state_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_state_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="73" visible="True" name="Sorter_city" column="city" wizardCaption="{res:city}" wizardSortingType="SimpleDir" wizardControl="city" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_city">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="74" visible="True" name="Sorter_zip" column="zip" wizardCaption="{res:zip}" wizardSortingType="SimpleDir" wizardControl="zip" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_zip">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="75" visible="True" name="Sorter_address1" column="address1" wizardCaption="{res:address1}" wizardSortingType="SimpleDir" wizardControl="address1" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_address1">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="76" visible="True" name="Sorter_address2" column="address2" wizardCaption="{res:address2}" wizardSortingType="SimpleDir" wizardControl="address2" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_address2">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="77" visible="True" name="Sorter_address3" column="address3" wizardCaption="{res:address3}" wizardSortingType="SimpleDir" wizardControl="address3" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_address3">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="78" visible="True" name="Sorter_date_add" column="date_add" wizardCaption="{res:date_add}" wizardSortingType="SimpleDir" wizardControl="date_add" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_date_add">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="79" visible="True" name="Sorter_date_last_login" column="date_last_login" wizardCaption="{res:date_last_login}" wizardSortingType="SimpleDir" wizardControl="date_last_login" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_date_last_login">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="80" visible="True" name="Sorter_ip_add" column="ip_add" wizardCaption="{res:ip_add}" wizardSortingType="SimpleDir" wizardControl="ip_add" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_ip_add">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="81" visible="True" name="Sorter_ip_update" column="ip_update" wizardCaption="{res:ip_update}" wizardSortingType="SimpleDir" wizardControl="ip_update" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_ip_update">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="82" visible="True" name="Sorter_language_id" column="language_id" wizardCaption="{res:language_id}" wizardSortingType="SimpleDir" wizardControl="language_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_language_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="83" visible="True" name="Sorter_image_url" column="image_url" wizardCaption="{res:image_url}" wizardSortingType="SimpleDir" wizardControl="image_url" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_image_url">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="84" visible="True" name="Sorter_age_id" column="age_id" wizardCaption="{res:age_id}" wizardSortingType="SimpleDir" wizardControl="age_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_age_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="85" visible="True" name="Sorter_gender_id" column="gender_id" wizardCaption="{res:gender_id}" wizardSortingType="SimpleDir" wizardControl="gender_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_gender_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="86" visible="True" name="Sorter_education_id" column="education_id" wizardCaption="{res:education_id}" wizardSortingType="SimpleDir" wizardControl="education_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_education_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="87" visible="True" name="Sorter_income_id" column="income_id" wizardCaption="{res:income_id}" wizardSortingType="SimpleDir" wizardControl="income_id" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_income_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="88" visible="True" name="Sorter_user_SSN" column="user_SSN" wizardCaption="{res:user_SSN}" wizardSortingType="SimpleDir" wizardControl="user_SSN" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_user_SSN">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="89" visible="True" name="Sorter_user_is_active" column="user_is_active" wizardCaption="{res:user_is_active}" wizardSortingType="SimpleDir" wizardControl="user_is_active" wizardAddNbsp="False" PathID="ContentPanel1usersSorter_user_is_active">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Link id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="user_id" fieldSource="user_id" wizardCaption="{res:user Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" hrefSource="users_maint.ccp" PathID="ContentPanel1usersuser_id" urlType="Relative">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="92" sourceType="DataField" format="yyyy-mm-dd" name="user_id" source="user_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</Link>
								<Label id="94" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="user_login" fieldSource="user_login" wizardCaption="{res:user Login}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersuser_login">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="96" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="first_name" fieldSource="first_name" wizardCaption="{res:first Name}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersfirst_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="98" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="last_name" fieldSource="last_name" wizardCaption="{res:last Name}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userslast_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="100" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="title" fieldSource="title" wizardCaption="{res:title}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userstitle">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="102" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="group_id" fieldSource="group_id" wizardCaption="{res:group Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1usersgroup_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="104" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="phone_home" fieldSource="phone_home" wizardCaption="{res:phone Home}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersphone_home">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="106" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="phone_work" fieldSource="phone_work" wizardCaption="{res:phone Work}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersphone_work">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="108" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="phone_day" fieldSource="phone_day" wizardCaption="{res:phone Day}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersphone_day">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="110" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="phone_cell" fieldSource="phone_cell" wizardCaption="{res:phone Cell}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersphone_cell">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="112" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="phone_evening" fieldSource="phone_evening" wizardCaption="{res:phone Evening}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersphone_evening">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="114" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="fax" fieldSource="fax" wizardCaption="{res:fax}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersfax">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="116" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="email" fieldSource="email" wizardCaption="{res:email}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersemail">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="118" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="card_number" fieldSource="card_number" wizardCaption="{res:card Number}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userscard_number">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="120" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="card_expire_date" fieldSource="card_expire_date" wizardCaption="{res:card Expire Date}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userscard_expire_date">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="122" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="country_id" fieldSource="country_id" wizardCaption="{res:country Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1userscountry_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="124" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="state_id" fieldSource="state_id" wizardCaption="{res:state Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1usersstate_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="126" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="city" fieldSource="city" wizardCaption="{res:city}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userscity">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="128" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="zip" fieldSource="zip" wizardCaption="{res:zip}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1userszip">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="130" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="address1" fieldSource="address1" wizardCaption="{res:address1}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersaddress1">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="132" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="address2" fieldSource="address2" wizardCaption="{res:address2}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersaddress2">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="134" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="address3" fieldSource="address3" wizardCaption="{res:address3}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersaddress3">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="136" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="date_add" fieldSource="date_add" wizardCaption="{res:date Add}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersdate_add">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="138" fieldSourceType="DBColumn" dataType="Date" html="False" generateSpan="False" name="date_last_login" fieldSource="date_last_login" wizardCaption="{res:date Last Login}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersdate_last_login">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="140" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ip_add" fieldSource="ip_add" wizardCaption="{res:ip Add}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersip_add">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="142" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="ip_update" fieldSource="ip_update" wizardCaption="{res:ip Update}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersip_update">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="144" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="language_id" fieldSource="language_id" wizardCaption="{res:language Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1userslanguage_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="146" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="image_url" fieldSource="image_url" wizardCaption="{res:image Url}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersimage_url">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="148" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="age_id" fieldSource="age_id" wizardCaption="{res:age Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1usersage_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="150" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="gender_id" fieldSource="gender_id" wizardCaption="{res:gender Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1usersgender_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="152" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="education_id" fieldSource="education_id" wizardCaption="{res:education Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1userseducation_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="154" fieldSourceType="DBColumn" dataType="Integer" html="False" generateSpan="False" name="income_id" fieldSource="income_id" wizardCaption="{res:income Id}" wizardIsPassword="False" parentName="users" rowNumber="1" wizardAlign="right" PathID="ContentPanel1usersincome_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="156" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="user_SSN" fieldSource="user_SSN" wizardCaption="{res:user SSN}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersuser_SSN">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Label id="158" fieldSourceType="DBColumn" dataType="Boolean" html="False" generateSpan="False" name="user_is_active" fieldSource="user_is_active" wizardCaption="{res:user Is Active}" wizardIsPassword="False" parentName="users" rowNumber="1" PathID="ContentPanel1usersuser_is_active">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Navigator id="159" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="TextButtons" wizardFirst="True" wizardFirstText="|&amp;lt;" wizardPrev="True" wizardPrevText="&amp;lt;&amp;lt;" wizardNext="True" wizardNextText="&amp;gt;&amp;gt;" wizardLast="True" wizardLastText="&amp;gt;|" wizardPageNumbers="Simple" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="Theme-gc-intranet">
									<Components/>
									<Events>
										<Event name="BeforeShow" type="Server">
											<Actions>
												<Action actionName="Hide-Show Component" actionCategory="General" id="160" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Navigator>
							</Components>
							<Events/>
							<TableParameters>
								<TableParameter id="33" conditionType="Parameter" useIsNull="False" field="user_login" parameterSource="s_user_login" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
								<TableParameter id="34" conditionType="Parameter" useIsNull="False" field="first_name" parameterSource="s_first_name" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
								<TableParameter id="35" conditionType="Parameter" useIsNull="False" field="last_name" parameterSource="s_last_name" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
								<TableParameter id="36" conditionType="Parameter" useIsNull="False" field="title" parameterSource="s_title" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
								<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="phone_home" parameterSource="s_phone_home" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
								<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="phone_work" parameterSource="s_phone_work" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
								<TableParameter id="39" conditionType="Parameter" useIsNull="False" field="phone_day" parameterSource="s_phone_day" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="7"/>
								<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="phone_cell" parameterSource="s_phone_cell" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="8"/>
								<TableParameter id="41" conditionType="Parameter" useIsNull="False" field="phone_evening" parameterSource="s_phone_evening" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="9"/>
								<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="fax" parameterSource="s_fax" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="10"/>
								<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="email" parameterSource="s_email" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="11"/>
								<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="notes" parameterSource="s_notes" dataType="Memo" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="12"/>
								<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="card_number" parameterSource="s_card_number" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="13"/>
								<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="card_expire_date" parameterSource="s_card_expire_date" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="14"/>
								<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="city" parameterSource="s_city" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="15"/>
								<TableParameter id="48" conditionType="Parameter" useIsNull="False" field="zip" parameterSource="s_zip" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="16"/>
								<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="address1" parameterSource="s_address1" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="17"/>
								<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="address2" parameterSource="s_address2" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="18"/>
								<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="address3" parameterSource="s_address3" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="19"/>
								<TableParameter id="52" conditionType="Parameter" useIsNull="False" field="ip_add" parameterSource="s_ip_add" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="20"/>
								<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="ip_update" parameterSource="s_ip_update" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="21"/>
								<TableParameter id="54" conditionType="Parameter" useIsNull="False" field="image_url" parameterSource="s_image_url" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="22"/>
								<TableParameter id="55" conditionType="Parameter" useIsNull="False" field="user_SSN" parameterSource="s_user_SSN" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="23"/>
							</TableParameters>
							<JoinTables>
								<JoinTable id="31" tableName="users" posWidth="-1" posHeight="-1" posLeft="-1" posRight="-1"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="90" tableName="users" fieldName="user_id"/>
								<Field id="93" tableName="users" fieldName="user_login"/>
								<Field id="95" tableName="users" fieldName="first_name"/>
								<Field id="97" tableName="users" fieldName="last_name"/>
								<Field id="99" tableName="users" fieldName="title"/>
								<Field id="101" tableName="users" fieldName="group_id"/>
								<Field id="103" tableName="users" fieldName="phone_home"/>
								<Field id="105" tableName="users" fieldName="phone_work"/>
								<Field id="107" tableName="users" fieldName="phone_day"/>
								<Field id="109" tableName="users" fieldName="phone_cell"/>
								<Field id="111" tableName="users" fieldName="phone_evening"/>
								<Field id="113" tableName="users" fieldName="fax"/>
								<Field id="115" tableName="users" fieldName="email"/>
								<Field id="117" tableName="users" fieldName="card_number"/>
								<Field id="119" tableName="users" fieldName="card_expire_date"/>
								<Field id="121" tableName="users" fieldName="country_id"/>
								<Field id="123" tableName="users" fieldName="state_id"/>
								<Field id="125" tableName="users" fieldName="city"/>
								<Field id="127" tableName="users" fieldName="zip"/>
								<Field id="129" tableName="users" fieldName="address1"/>
								<Field id="131" tableName="users" fieldName="address2"/>
								<Field id="133" tableName="users" fieldName="address3"/>
								<Field id="135" tableName="users" fieldName="date_add"/>
								<Field id="137" tableName="users" fieldName="date_last_login"/>
								<Field id="139" tableName="users" fieldName="ip_add"/>
								<Field id="141" tableName="users" fieldName="ip_update"/>
								<Field id="143" tableName="users" fieldName="language_id"/>
								<Field id="145" tableName="users" fieldName="image_url"/>
								<Field id="147" tableName="users" fieldName="age_id"/>
								<Field id="149" tableName="users" fieldName="gender_id"/>
								<Field id="151" tableName="users" fieldName="education_id"/>
								<Field id="153" tableName="users" fieldName="income_id"/>
								<Field id="155" tableName="users" fieldName="user_SSN"/>
								<Field id="157" tableName="users" fieldName="user_is_active"/>
							</Fields>
							<PKFields/>
							<SPParameters/>
							<SQLParameters/>
							<SecurityGroups/>
							<Attributes/>
							<Features/>
						</Grid>
					</Components>
					<Events/>
					<Attributes/>
					<Features>
						<JUpdatePanel id="3" enabled="True" childrenAsTriggers="True" name="UpdatePanel1" category="jQuery">
							<Components/>
							<Events/>
							<ControlPoints/>
							<Features/>
						</JUpdatePanel>
					</Features>
				</Panel>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="164" visible="True" generateDiv="False" name="Menu" contentPlaceholder="Menu">
			<Components>
				<IncludePage id="167" name="MenuIncludablePage" PathID="MenuMenuIncludablePage" parentType="Page" page="MenuIncludablePage.ccp">
					<Components/>
					<Events/>
					<Features/>
				</IncludePage>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="165" visible="True" generateDiv="False" name="Sidebar1" contentPlaceholder="Sidebar1">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="166" visible="True" generateDiv="False" name="HeaderSidebar" contentPlaceholder="HeaderSidebar">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="users_list_events.php" forShow="False" comment="//" codePage="utf-8"/>
<CodeFile id="Code" language="PHPTemplates" name="users_list.php" forShow="True" url="users_list.php" comment="//" codePage="utf-8"/>
</CodeFiles>
	<SecurityGroups>
		<Group id="161" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
