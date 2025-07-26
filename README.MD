# CodeWars project
![Practice makes perfect](/public/img/img_1.png "CodeWars")

![Codewars](https://github.r2v.ch/codewars?user=ssamko0911&top_languages=true)

![Practice makes perfect](/public/img/img.png "LeetCode")

The project is a clear representation of sharpening my coding skills.

### Start PHP and Caddy containers:
```bash
docker compose up -d --build
```

### Start DB (Postgres) container:
```bash
docker compose -f docker-compose.services.yml -p codewars-services up -d
```

### Stop and Remove containers:
```bash
docker compose down -v --remove-orphans
```
