all: build deploy

build:
	jekyll build

deploy:
	rsync -avr --delete-after --delete-excluded   _site/ rapier:rapier.atlantia.sca.org

clean:
	rm -rf _site
