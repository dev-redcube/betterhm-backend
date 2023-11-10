# VERSION defines the version for the docker containers.
# To build a specific set of containers with a version,
# you can use the VERSION as an arg of the docker build command (e.g make docker VERSION=0.0.2)
VERSION ?= latest

# REGISTRY defines the registry where we store our images.
# To push to a specific registry,
# you can use the REGISTRY as an arg of the docker build command (e.g make docker REGISTRY=my_registry.com/username)
# You may also change the default value if you are using a different registry as a default
REGISTRY ?= ghcr.io/dev-redcube/betterhm-backend

build:
	docker build . --target cli -t ${REGISTRY}:${VERSION}
	docker build . --target fpm_server -t ${REGISTRY}:${VERSION}
	docker build . --target web_server -t ${REGISTRY}:${VERSION}
	docker build . --target cron -t ${REGISTRY}:${VERSION}

buildx:
	docker buildx build . --target cli -t ${REGISTRY}/cli:${VERSION} --platform linux/amd64,linux/arm64 --push
	docker buildx build . --target fpm_server -t ${REGISTRY}/fpm_server:${VERSION} --platform linux/amd64,linux/arm64 --push
	docker buildx build . --target web_server -t ${REGISTRY}/web_server:${VERSION} --platform linux/amd64,linux/arm64 --push
	docker buildx build . --target cron -t ${REGISTRY}/cron:${VERSION} --platform linux/amd64,linux/arm64 --push
