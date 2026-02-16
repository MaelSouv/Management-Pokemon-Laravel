import requests
import json
import os
import time

BASE_URL = "https://pokeapi.co/api/v2"
OUTPUT_JSON = "all_pokemon.json"
IMAGE_DIR = "images"

os.makedirs(IMAGE_DIR, exist_ok=True)

def get_json(url):
    response = requests.get(url)
    response.raise_for_status()
    return response.json()

print("📥 Récupération de la liste de toutes les formes Pokémon...")
forms = get_json(f"{BASE_URL}/pokemon-form?limit=10000")["results"]

all_pokemon = []

for index, form in enumerate(forms, 1):
    try:
        form_data = get_json(form["url"])
        pokemon_data = get_json(form_data["pokemon"]["url"])

        # Récupération image officielle
        image_url = pokemon_data["sprites"]["other"]["official-artwork"]["front_default"]

        pokemon_entry = {
            "id": form_data["id"],
            "name": form_data["name"],
            "base_pokemon": form_data["pokemon"]["name"],
            "form_name": form_data["form_name"],
            "types": [t["type"]["name"] for t in form_data["types"]],
            "stats": {
                s["stat"]["name"]: s["base_stat"]
                for s in pokemon_data["stats"]
            },
            "height": pokemon_data["height"],
            "weight": pokemon_data["weight"],
            "is_mega": form_data["is_mega"],
            "is_gmax": form_data.get("is_gmax", False),
            "image": f"{IMAGE_DIR}/{form_data['name']}.png"
        }

        all_pokemon.append(pokemon_entry)

        # Téléchargement image
        if image_url:
            image_path = os.path.join(IMAGE_DIR, f"{form_data['name']}.png")
            if not os.path.exists(image_path):
                img = requests.get(image_url, timeout=10)
                if img.status_code == 200:
                    with open(image_path, "wb") as f:
                        f.write(img.content)

        print(f"✔️ {index}/{len(forms)} : {form_data['name']}")
        time.sleep(0.25)  # Respect PokéAPI

    except Exception as e:
        print(f"❌ Erreur avec {form['name']} : {e}")

print("💾 Écriture du fichier JSON...")
with open(OUTPUT_JSON, "w", encoding="utf-8") as f:
    json.dump(all_pokemon, f, ensure_ascii=False, indent=2)

print("🎉 TERMINÉ !")
print(f"📄 JSON : {OUTPUT_JSON}")
print(f"🖼️ Images : dossier '{IMAGE_DIR}/'")
