Step 1 : Run
cd backend && cp .env.example .env
Step 2 : Run
docker compose build
Step 3 : Run
docker compose up -d
Step 4 : Run
docker compose run --rm php sh /setup.sh
Step 5 : Config file .env