.PHONY: git echo

# test
echo:
	echo "Test";

git:
	git pull
	git add .
	git commit -m "commit"
	git push
