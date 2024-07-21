from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # This will handle CORS for all routes

# Sample user data
users = [
      {
            'email': 'daniel@email.com',
            'password': '123456',
            'pokemon_name': 'Pikachu',
            'pokemon_image': 'https://upload.wikimedia.org/wikipedia/en/a/a6/Pok%C3%A9mon_Pikachu_art.png'
      },
      {
            'email': 'fabian@email.com',
            'password': '654321',
            'pokemon_name': 'Charmander',
            'pokemon_image': 'https://assets.pokemon.com/assets/cms2/img/pokedex/full//004.png'
      }
]

@app.route('/login', methods=['OPTIONS'])
def options():
      response = jsonify({'message': 'Preflight request successful'})
      response.headers.add('Access-Control-Allow-Origin', '*')
      response.headers.add('Access-Control-Allow-Methods', 'POST, OPTIONS')
      response.headers.add('Access-Control-Allow-Headers', 'Content-Type')
      return response

@app.route('/login', methods=['POST'])
def login():
      # Get JSON data from the request
      data = request.get_json()
      email = data.get('email')
      password = data.get('password')

      # Check credentials
      logged_in_user_data = next((user for user in users if user['email'] == email and user['password'] == password), None)

      # Prepare response data
      if logged_in_user_data:
            response = {
                  'success': True,
                  'message': 'User logged in successfully!',
                  'user': logged_in_user_data
            }
      else:
            response = {
                  'success': False,
                  'message': 'Invalid credentials!'
            }

      return jsonify(response)

if __name__ == '__main__':
      app.run(debug=True)
