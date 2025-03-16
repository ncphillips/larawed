import { route as routeFn } from "ziggy-js";

declare global {
  let route: typeof routeFn;
}

declare module "vue" {
  interface ComponentCustomProperties {
    route: typeof routeFn;
  }
}

declare module "@inertiajs/core" {
  import NavData = App.Data.NavData;

  export interface PageProps {
    [key: string]: unknown;
  }
}
