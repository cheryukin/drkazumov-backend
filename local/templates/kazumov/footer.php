<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<?if (!$isMainPage):?>

         </section>
    </div>
    <!-- end main wrapper-->
<?endif;?>
<? SiteHelper::showArea('include/contacts')?>
</main>
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"COMPONENT_TEMPLATE" => ".default",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/footer.php"
		)
	);?>
</div>
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"COMPONENT_TEMPLATE" => ".default",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/modals.php"
		)
	);?>
	</body>
</html>