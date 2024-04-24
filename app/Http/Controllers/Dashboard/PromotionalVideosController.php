<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\PromotionalVideo;
use Storage;
class PromotionalVideosController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:كل الفيديوهات', ['only' => ['index']]);
         $this->middleware('permission:رفع فيديو', ['only' => ['uploadVideoForm','uploadVideo']]);
         $this->middleware('permission:حذف فيديو', ['only' => ['deleteVideo']]);
    }

   public function index(Request $request)
   {
      $PromotionalVideos = PromotionalVideo::orderBy('id','DESC')->paginate(5);
      return view('dashboard.promotional-videos.index',compact('PromotionalVideos'))
          ->with('i', ($request->input('page', 1) - 1) * 5);     
   } 
   public function uploadVideoForm()
   {
    return view('dashboard.promotional-videos.uploadVideo');
   } 
   public function uploadVideo(Request $request)
   {
      $this->validate($request, [         
         'video' => 'required|file|mimetypes:video/mp4',
   ]);
   $pv = new PromotionalVideo;  
   if ($request->hasFile('video'))
   {
    $path = $request->file('video')->store('videos', ['disk' =>      'my_files']);
    $pv->video = $path;
   }
   $pv->save();  
   return back()->with('success', 'Video uploaded successfully.');  
  }
  public function deleteVideo($videoId)
    {
        // Retrieve the video record from the database
        $video = PromotionalVideo::findOrFail($videoId);

        // Delete the file from the storage directory
  //  Storage::disk('public')->delete($video->file_path);

        // Delete the record from the database
        $video->delete();

        return back()->with('success', 'Video deleted successfully.');
    }

}