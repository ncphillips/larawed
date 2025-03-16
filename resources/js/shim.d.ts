declare module "@inertiajs/core" {
  import NavData = App.Data.NavData;
  import SharedInertiaData = App.Data.SharedInertiaData;

  export interface PageProps extends SharedInertiaData {
    [key: string]: unknown;
  }
}
