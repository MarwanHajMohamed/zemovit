<p align="center"><a href="https://nami-tec.com/" target="_blank"><img src="https://nami-tec.com/storage/images/setting/yaB9ydrZ6H1723379385.webp.svg" width="400" alt="Laravel Logo"></a></p>


# 🎉 Welcome to Nami Dashboard!


## 🚀 Getting Started

1. **Run the Command:**

    ```bash
    php artisan app:set-project-files YourProjectName --resources --blades
    ```


2. **Options:**

    - **`--resources`** *(optional)*: Use this flag to generate API resources.
    - **`--blades`** *(optional)*: Use this flag to create CRUD blade templates.

3. **Installation Prompt:**

    - When you run the command, you will be ask to install `krlove/eloquent-model-generator`, which is required for generating models with relationships.
    - **Important:** If you choose to install, you must re-run the command afterward to complete the setup.



##  🔧 Want to modify ?

- **Templates Location:** `App/Utils`
- **Available Templates:** Requests, Services, Controllers, Resources, and Models.

    - **Model Templates:**
        - **`ModelTemplate`**: Used for standard models.
        - **`ModelTranslationTemplate`**: Used for models that has seperated translation model.

      **Example:** For `City` and `CityTranslation` tables, `City` will use `ModelTranslationTemplate`, while `CityTranslation` will use `ModelTemplate`.
