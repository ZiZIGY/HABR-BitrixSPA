import { ajax, create, processHTML } from "main.core";

export class Routing {
  #signedParameters;
  #routing;
  #content;
  #routes;

  constructor(signedParameters) {
    this.#signedParameters = signedParameters;
    this.#routes = [];

    this.#routing = document.getElementById("routing");
    this.#content = document.getElementById("content");

    this.#initEvents();
  }
  #initEvents() {
    this.#routing.querySelectorAll("a").forEach((route) => {
      const path = route.getAttribute("href");
      const routeKey = route.dataset.route;

      this.#routes.push({
        path: path,
        routeKey: routeKey,
        disabled: false,
      });

      route.onclick = (e) => {
        e.preventDefault();
        ajax.history.put({}, path);

        this.#updateContent();
      };
    });
    window.onpopstate = () => {
      this.#updateContent();
    };
  }
  async #updateContent() {
    const path = window.location.pathname;

    const routeKey = this.#routes.find(
      (route) => route.path === path
    )?.routeKey;

    const closePageTransition = this.#content.animate(
      {
        opacity: [1, 0],
        transform: ["translateY(0)", "translateY(20px)"],
      },
      {
        duration: 300,
        fill: "forwards",
      }
    );

    closePageTransition.onfinish = async () => {
      try {
        const response = await ajax.runComponentAction(
          "test:routing",
          "updateContent",
          {
            mode: "class",
            data: {
              routeKey: routeKey,
            },
            signedParameters: this.#signedParameters,
          }
        );

        const { HTML, SCRIPT, STYLE } = processHTML(response.data.html);

        this.#content.innerHTML = HTML;

        SCRIPT.forEach((script) => {
          const scriptElement = create("script", {
            html: script.JS,
          });

          this.#content.appendChild(scriptElement);
        });
      } catch (error) {
        console.error(error);
      } finally {
        this.#content.animate(
          {
            opacity: [0, 1],
            transform: ["translateY(20px)", "translateY(0)"],
          },
          {
            duration: 300,
            fill: "forwards",
          }
        );
      }
    };
  }
}
