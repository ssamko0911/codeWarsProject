# CodeWars project
![Practice makes perfect](/public/img/img_1.png "CodeWars")

![Codewars](https://github.r2v.ch/codewars?user=ssamko0911&top_languages=true)

![Practice makes perfect](/public/img/img.png "LeetCode")

The project is a clear representation of sharpening my coding skills.

### Start php and caddy containers:
```bash
docker compose up -d --build
```

### Start postgres container:
```bash
docker compose -f docker-compose.services.yml -p codewars-services up -d
```

```bash
docker compose down -v --remove-orphans
```
