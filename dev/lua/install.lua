local poRoot = "/po"

function setupPORoot()
	if not (fs.exists(poRoot) and fs.isDir(poRoot)) then
		textutils.slowPrint("Creating PO root...")
		fs.makeDir(poRoot)
	else
		print("Root exists")
	end
end

setupPORoot()