# VERSION defines the version for the docker containers.
# To build a specific set of containers with a version,
# you can use the VERSION as an arg of the docker build command (e.g make docker VERSION=0.0.2)
VERSION ?= latest

# REGISTRY defines the registry where we store our images.
# To push to a specific registry,
# you can use the REGISTRY as an arg of the docker build command (e.g make docker REGISTRY=my_registry.com/username)
# You may also change the default value if you are using a different registry as a default
REGISTRY ?= ghcr.io/dev-redcube/betterhm-backend


# Commands
docker: docker-build docker-push

docker-build:
	docker buildx build . --target cli -t ${REGISTRY}/cli:${VERSION} --platform linux/amd64,linux/arm64
	docker buildx build . --target fpm_server -t ${REGISTRY}/fpm_server:${VERSION} --platform linux/amd64,linux/arm64
	docker buildx build . --target web_server -t ${REGISTRY}/web_server:${VERSION} --platform linux/amd64,linux/arm64
	docker buildx build . --target cron -t ${REGISTRY}/cron:${VERSION} --platform linux/amd64,linux/arm64

docker-push:
	docker push ${REGISTRY}/cli:${VERSION}
	docker push ${REGISTRY}/cron:${VERSION}
	docker push ${REGISTRY}/fpm_server:${VERSION}
	docker push ${REGISTRY}/web_server:${VERSION}
