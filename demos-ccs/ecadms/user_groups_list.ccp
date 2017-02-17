<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" masterPage="{CCS_PathToMasterPage}/MasterPage.ccp" useDesign="True" wizardTheme="None" needGeneration="0">
	<Components>
		<Panel id="22" visible="True" generateDiv="False" name="Head" contentPlaceholder="Head">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="23" visible="True" generateDiv="False" name="Content" contentPlaceholder="Content">
			<Components>
				<Panel id="2" visible="True" generateDiv="True" name="Panel1" PathID="ContentPanel1" features="(assigned)">
					<Components>
						<Record id="4" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="user_groupsSearch" returnPage="user_groups_list.ccp" wizardCaption="{res:Search_Form}" wizardOrientation="Vertical" wizardFormMethod="post" wizardTypeComponent="Search" PathID="ContentPanel1user_groupsSearch" parentId="8">
							<Components>
								<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="{res:CCS_Search}" parentName="user_groupsSearch" PathID="ContentPanel1user_groupsSearchButton_DoSearch">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Button>
								<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_group_name" wizardCaption="{res:group_name}" fieldSource="group_name" wizardIsPassword="False" parentName="user_groupsSearch" caption="{res:group_name}" required="False" unique="False" wizardSize="50" wizardMaxLength="50" PathID="ContentPanel1user_groupsSearchs_group_name">
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
						<Grid id="8" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="20" name="user_groups" connection="myproject" pageSizeLimit="100" wizardCaption="{res:user_groups_GridForm}" wizardGridType="Tabular" wizardAllowSorting="True" wizardSortingType="SimpleDir" wizardUsePageScroller="True" wizardAllowInsert="True" wizardAltRecord="False" wizardRecordSeparator="False" wizardAltRecordType="Controls" wizardUseSearch="True" childId="4" dataSource="user_groups">
							<Components>
								<Link id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="user_groups_Insert" hrefSource="user_groups_maint.ccp" removeParameters="group_id" wizardThemeItem="NavigatorLink" wizardDefaultValue="{res:CCS_InsertLink}" parentName="user_groups" PathID="ContentPanel1user_groupsuser_groups_Insert">
									<Components/>
									<Events/>
									<LinkParameters/>
									<Attributes/>
									<Features/>
								</Link>
								<Sorter id="12" visible="True" name="Sorter_group_id" column="group_id" wizardCaption="{res:group_id}" wizardSortingType="SimpleDir" wizardControl="group_id" wizardAddNbsp="False" PathID="ContentPanel1user_groupsSorter_group_id">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Sorter id="13" visible="True" name="Sorter_group_name" column="group_name" wizardCaption="{res:group_name}" wizardSortingType="SimpleDir" wizardControl="group_name" wizardAddNbsp="False" PathID="ContentPanel1user_groupsSorter_group_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Sorter>
								<Link id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" preserveParameters="GET" name="group_id" fieldSource="group_id" wizardCaption="{res:group Id}" wizardIsPassword="False" parentName="user_groups" rowNumber="1" wizardAlign="right" hrefSource="user_groups_maint.ccp" PathID="ContentPanel1user_groupsgroup_id" urlType="Relative">
									<Components/>
									<Events/>
									<LinkParameters>
										<LinkParameter id="16" sourceType="DataField" format="yyyy-mm-dd" name="group_id" source="group_id"/>
									</LinkParameters>
									<Attributes/>
									<Features/>
								</Link>
								<Label id="18" fieldSourceType="DBColumn" dataType="Text" html="False" generateSpan="False" name="group_name" fieldSource="group_name" wizardCaption="{res:group Name}" wizardIsPassword="False" parentName="user_groups" rowNumber="1" PathID="ContentPanel1user_groupsgroup_name">
									<Components/>
									<Events/>
									<Attributes/>
									<Features/>
								</Label>
								<Navigator id="19" size="10" type="Simple" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="TextButtons" wizardFirst="True" wizardFirstText="|&amp;lt;" wizardPrev="True" wizardPrevText="&amp;lt;&amp;lt;" wizardNext="True" wizardNextText="&amp;gt;&amp;gt;" wizardLast="True" wizardLastText="&amp;gt;|" wizardPageNumbers="Simple" wizardTotalPages="False" wizardHideDisabled="False" wizardOfText="{res:CCS_Of}" wizardPageSize="True" wizardImagesScheme="Theme-gc-intranet">
									<Components/>
									<Events>
										<Event name="BeforeShow" type="Server">
											<Actions>
												<Action actionName="Hide-Show Component" actionCategory="General" id="20" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
											</Actions>
										</Event>
									</Events>
									<Attributes/>
									<Features/>
								</Navigator>
							</Components>
							<Events/>
							<TableParameters>
								<TableParameter id="11" conditionType="Parameter" useIsNull="False" field="group_name" parameterSource="s_group_name" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
							</TableParameters>
							<JoinTables>
								<JoinTable id="9" tableName="user_groups" posWidth="-1" posHeight="-1" posLeft="-1" posRight="-1"/>
							</JoinTables>
							<JoinLinks/>
							<Fields>
								<Field id="14" tableName="user_groups" fieldName="group_id"/>
								<Field id="17" tableName="user_groups" fieldName="group_name"/>
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
		<Panel id="24" visible="True" generateDiv="False" name="Menu" contentPlaceholder="Menu">
			<Components>
				<IncludePage id="27" name="MenuIncludablePage" PathID="MenuMenuIncludablePage" parentType="Page" page="MenuIncludablePage.ccp">
					<Components/>
					<Events/>
					<Features/>
				</IncludePage>
			</Components>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="25" visible="True" generateDiv="False" name="Sidebar1" contentPlaceholder="Sidebar1">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
		<Panel id="26" visible="True" generateDiv="False" name="HeaderSidebar" contentPlaceholder="HeaderSidebar">
			<Components/>
			<Events/>
			<Attributes/>
			<Features/>
		</Panel>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="user_groups_list_events.php" forShow="False" comment="//" codePage="utf-8"/>
<CodeFile id="Code" language="PHPTemplates" name="user_groups_list.php" forShow="True" url="user_groups_list.php" comment="//" codePage="utf-8"/>
</CodeFiles>
	<SecurityGroups>
		<Group id="21" groupID="10"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
