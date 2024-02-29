
# Symfony Casino Project - Multiple Group
## Completed Tasks

Load Games List:
- Successfully integrated with the provided API (https://casino-games-api.united-remote.dev/api-docs/#/default/get_games) to retrieve the list of casino games. The application fetches this list and displays it on the initial load.

- Implemented a lazy loading mechanism, enhancing the application's performance. This is achieved by dynamically loading game details only when a user requests to view them, reducing the initial load time and resource consumption.

Search for a Game:
- Added a responsive search feature allowing users to search for games by name. The search functionality is optimized to provide relevant results quickly, enhancing user experience.
- The search is performed without reloading the page, leveraging AJAX calls to fetch and display search results dynamically.

View Game Image and Name:
- For each game in the list, the application displays its image and name, providing a user-friendly interface. This includes structuring the games list to highlight the game visuals and information clearly.

- Detailed game information, including images, is accessible through a modal window that opens upon user interaction, ensuring a seamless experience without navigating away from the games list.

- The application has been containerized using Docker, facilitating ease of deployment and ensuring consistency across different environments. This includes a Dockerfile and docker-compose.yml for straightforward setup and execution.
### Nice to Haves

Lazy Loading:
- The application's performance is further optimized through lazy loading techniques, especially evident in how game details are fetched and rendered. This approach minimizes the initial page load time and enhances the application's overall responsiveness.

Docker Containerized App:
- The application has been containerized using Docker, facilitating ease of deployment and ensuring consistency across different environments. This includes a Dockerfile and docker-compose.yml for straightforward setup and execution.

### Other Requirements

- The project's code is almost well-organized, reflecting a structure suitable for prototype project. This includes a logical separation of concerns, use of services for API interactions, and adherence to Symfony's best practices for MVC applications at least I tried as much as I can.


Uncompleted Tasks

While the core functionality and nice-to-have features were addressed, there are always opportunities for further improvement or features that were considered but not implemented due to time constraints or scope considerations. These might include:
- Advanced Search and Filtering: Expanding the search functionality to include filters for categories or providers.
- Performance Optimization: Further optimization, such as server-side rendering for the initial games list or incorporating a more advanced lazy loading library. And maybe less jquery and javascript more frameworks like React or Vue.
- User Interface Enhancements: Additional UI/UX could use a lot of more improvements to make the games lobby more engaging and visually appealing.



- This project is a Symfony-based web application for showcasing casino games. It features a dynamic interface for listing games, viewing game details through modals, and includes responsive design for optimal viewing on various devices. Utilizing AJAX for dynamic content loading, it offers a seamless user experience without full page reloads.

## Installation and Setup

### Prerequisites

- Docker
- Docker Compose
- Git (for version control)

### Getting Started

1. **Clone the repository**

   ```bash
   git clone https://yourrepository.git
   cd yourrepository
   ```

2. **Start the Docker Containers**

   Ensure Docker is running on your machine. Then, from the root of the project (where `docker-compose.yml` is located), run:

   ```bash
   docker-compose up -d
   ```

   This command builds the Docker images and starts the containers as defined in `docker-compose.yml`.

3. **Access the Application**

   After the containers are up and running, access the application via `http://localhost:8000` or the configured port in your `.env` file or `docker-compose.yml`.

## Features

- **Dynamic Game Listing**: Games are listed with options to view detailed information.
- **Modal for Game Details**: Detailed information about each game can be viewed in a modal without reloading the page.
- **Responsive Design**: The application is fully responsive, ensuring a great user experience on desktops, tablets, and mobile phones.
- **AJAX Content Loading**: Utilizes AJAX for fetching and displaying game details dynamically.

## Contributing

Contributions to the project are welcome! Please follow the standard pull request process: fork the repository, make your changes, and submit a pull request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.
