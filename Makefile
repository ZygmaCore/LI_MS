# Makefile
.PHONY: up down build clean logs restart dev prod test git

# test
test_echo:
	echo "Test";

# Yang Penting Penting Ajaa
git:
	git pull
	git add .
	git commit -m "commit"
	git push -u origin main
